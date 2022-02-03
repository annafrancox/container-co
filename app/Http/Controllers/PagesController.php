<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Container;
use Illuminate\Http\Request;

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
        $containersNames = Container::all()->pluck('name')->toArray();
        $productsByContainer = [];
        foreach (Container::all() as $container) {
            $productsSum = $container->total_amount != 0 ? round(($container->products->pluck('amount')->sum() / $container->total_amount) * 100) : 0;
            array_push($productsByContainer, $productsSum);
        }
        return view('admin.dashboard', compact('containersNames', 'productsByContainer'));
    }
}
