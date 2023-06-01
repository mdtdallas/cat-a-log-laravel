<?php

namespace App\Http\Controllers;

use App\Models\CatType;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CatTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $types = CatType::all();
        return view('cat-type.index', compact('types'));
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
            'type_name' => 'required|string|max:255',
        ]);

        CatType::create($validated);

        return redirect()->route('types.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CatType $catType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CatType $type): View
    {
        return view('cat-type.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CatType $type)
    {
        $validated = $request->validate([
            'type_name' => 'required|string|max:255',
        ]);

        $type->update($validated);

        return redirect()->route('types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CatType $type)
    {
        $type->delete();

        return redirect()->route('types.index');
    }
}
