<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Http\Requests\ContentRequest;
use Response;

class ContentController extends Controller
{

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContentRequest $request)
    {
        $content = Content::where('id', $request->content_id)->first();
        Content::deleteFile($content->file_path, 'public/boxes/files/');
        $content->delete();
    }

    public function downloadFile(ContentRequest $request)
    {
        $content = Content::where('id', $request->content_id)->first();

        $pos = strpos($content->file_path, '.');
        $extension = substr($content->file_path, $pos+1, strlen($content->file_path));
        $file = storage_path(str_replace('storage', 'app/public', $content->file_path));

        if(file_exists($file)){
            return Response::download($file, $content->name . '.' . $extension);
        }

        return redirect()->back();
        
    }
    
}
