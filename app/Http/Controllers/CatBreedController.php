<?php

namespace App\Http\Controllers;

use App\Models\CatBreed;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CatBreedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $breeds = CatBreed::all();
        return view('cat-breed.index', compact('breeds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'breed_name' => 'required|string|max:255',
        ]);

        CatBreed::create($validated);

        return redirect()->route('breeds.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CatBreed $catBreed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CatBreed $breed): View
    {
        return view('cat-breed.edit', compact('breed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CatBreed $breed): RedirectResponse
    {
        $validated = $request->validate([
            'breed_name' => 'required|string|max:255',
        ]);

        $breed->update($validated);

        return redirect()->route('breeds.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CatBreed $breed): RedirectResponse
    {
        $breed->delete();

        return redirect()->route('breeds.index');
    }
}
