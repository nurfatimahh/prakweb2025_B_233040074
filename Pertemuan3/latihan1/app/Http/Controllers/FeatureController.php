<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $features = Feature::orderBy('id', 'asc')->get();
        return view('dashboard.features.index', compact('features'));
    }

    public function create()
    {
        return view('dashboard.features.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'key' => 'required|alpha_dash|unique:features,key',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        Feature::create($data);
        return redirect()->route('dashboard.features.index')->with('success','Feature berhasil dibuat');
    }

    public function edit(Feature $feature)
    {
        return view('dashboard.features.edit', compact('feature'));
    }

    public function update(Request $request, Feature $feature)
    {
        $data = $request->validate([
            'key' => 'required|alpha_dash|unique:features,key,' . $feature->id,
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $feature->update($data);
        return redirect()->route('dashboard.features.index')->with('success','Feature berhasil diperbarui');
    }

    public function destroy(Feature $feature)
    {
        $feature->delete();
        return redirect()->route('dashboard.features.index')->with('success','Feature berhasil dihapus');
    }
}
