<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use Illuminate\Http\Request;

class LaptopController extends Controller
{
    public function index()
    {
        $laptops = Laptop::latest()->get();
        return view('home', compact('laptops'));
    }

    public function create()
    {
        return view('dashboard.laptop.create');
    }

    public function store(Request $request)
    {
        Laptop::create($request->all());
        return redirect()->route('laptop.index');
    }

    public function edit(Laptop $laptop)
    {
        return view('dashboard.laptop.edit', compact('laptop'));
    }

    public function update(Request $request, Laptop $laptop)
    {
        $laptop->update($request->all());
        return redirect()->route('laptop.index');
    }

    public function destroy(Laptop $laptop)
    {
        $laptop->delete();
        return redirect()->route('laptop.index');
    }
}
