<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PagesController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        if (!Auth::hasUser()) {
            return view('auth.login');
        } else {
            return redirect()->route('dashboard');
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
