<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Content;
use Illuminate\Http\Request;
use App\Http\Requests\BoxSearchRequest;
use App\Http\Requests\BoxRequest;
use App\Http\Requests\BoxBannerRequest;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BoxSearchRequest $request)
    {
        if($request->search != null){
            $boxes = Box::where('name', $request->search)
            ->orWhere('name', 'like', '%' . $request->search . '%')->paginate(6);
        } else{
            $boxes = Box::paginate(6);
        }
        return view('admin.boxes.index', compact('boxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $box = new Box();
        return view('admin.boxes.create', compact('box'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BoxRequest $request)
    {
        $data = $request->validated();
        $box = Box::create($data);
        return redirect()->route('boxes.edit', $box->id)->with('success',true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Box  $box
     * @return \Illuminate\Http\Response
     */
    public function show(Box $box)
    {
        return view('admin.boxes.show', compact('box'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Box  $box
     * @return \Illuminate\Http\Response
     */
    public function edit(Box $box)
    {
        return view('admin.boxes.edit', compact('box'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Box  $box
     * @return \Illuminate\Http\Response
     */
    public function update(BoxRequest $request, Box $box)
    {
        $data = $request->validated();
        $files = $request->content_list;
        $contents = [];
        if($request->hasFile('content_list'))
        {
            foreach ($files as $key => $file) {
                $data = Content::savefile($data, $key, 'content_list', 'public/boxes/files/', 'content_name');
                $content = Content::create(['file_path' => $data['content_list'][$key], 'box_id' => $box->id, 'name' => $data['content_name'][$key]]);
                $contents[$key] = $content;
                unset($data['content_list'][$key]);
                unset($data['content_name'][$key]);
            }
        }
        $box->update($data);
        $ajax = true;
        if(!empty($contents)){
            return view('admin.contents.contentAjax', compact('contents', 'box', 'ajax'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Box  $box
     * @return \Illuminate\Http\Response
     */
    public function destroy(Box $box)
    {
        foreach($box->contents as $content){
            Content::deleteFile($content->file_path, 'public/boxes/files/');
        }

        $box->delete();
        return redirect()->route('boxes.index')->with('success',true);
    }

    public function changeBanner(BoxBannerRequest $request){
        $box = Box::where('id', $request->box_id)->first();
        $content = Content::where('id', $request->content_id)->first();

        if($box->banner != null && $box->banner->id == $request->content_id){
            $box->banner()->dissociate();
        } else{
            $box->banner()->associate($content);
        }
        
        $box->save();
    }
}
