<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $user->setDefaultImg();
        return view('admin.users.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $data = User::verifyUpdatePassword($data);
        if (array_key_exists('admin', $data) && !auth()->user()->admin) {
            unset($data['admin']);
        }
        $user = User::create($data);
        $data = User::saveImg($data, 'profile_path', 'public/img/profile/', $user->profile_path);
        return redirect()->route('users.index')->with('success', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();
        $data = User::verifyUpdatePassword($data);
        if (array_key_exists('admin', $data) && !auth()->user()->admin) {
            unset($data['admin']);
        }
        $data = User::saveImg($data, 'profile_path', 'public/img/profile/', $user->profile_path);
        $user->update($data);
        if (Gate::allows('user-admin')) {
            $user->save();
        }
        return redirect()->back()->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->profile_path != 'storage/img/profile/profile_default.png') {
            User::deleteImg($user->profile_path, 'public/img/profile/');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', true);
    }
}
