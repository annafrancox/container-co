<?php

namespace App\Http\Controllers;

use App\Models\Container;
use Illuminate\Http\Request;
use App\Http\Requests\ContainerRequest;

class ContainerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Container::class, 'container');
    }

    public function index()
    {
        $containers = Container::all();
        return view('admin.containers.index', compact('containers'));
    }

    public function create()
    {
        $container = new Container();
        return view('admin.containers.create', compact('container'));
    }

    public function store(ContainerRequest $request)
    {
        Container::create($request->validated());
        return redirect()->route('containers.index')->with('success', true);
    }

    public function edit(Container $container)
    {
        return view('admin.containers.edit', compact('container'));
    }

    public function update(ContainerRequest $request, Container $container)
    {
        if ($request->has('total_amount')) {
            $productsSum = $container->products->pluck('amount')->sum();
            if ($productsSum > $request->total_amount) {
                return redirect()->route('containers.edit', $container)->with('error', 'O container já possui mais de ' . $request->total_amount . ' produtos');
            }
        }
        $container->update($request->validated());
        return redirect()->route('containers.index')->with('success', true);
    }
    
    public function destroy(Container $container)
    {
        $container->delete();
        return redirect()->route('containers.index')->with('success', true);
    }
}
