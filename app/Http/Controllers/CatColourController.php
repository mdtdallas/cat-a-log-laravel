<?php

namespace App\Http\Controllers;

use App\Models\CatColour;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Pagination\LengthAwarePaginator;


class CatColourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $colours = CatColour::distinct()->paginate(15);
        
        return view('cat-colour.index', compact('colours'));
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
            'colour_name' => 'required|string|max:255',
        ]);

        CatColour::create($validated);

        return redirect()->route('colours.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CatColour $catColour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CatColour $colour) : View
    {
        return view('cat-colour.edit', compact('colour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CatColour $colour): RedirectResponse
    {
        $validated = $request->validate([
            'colour_name' => 'required|string|max:255',
        ]);

        $colour->update($validated);

        return redirect()->route('colours.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CatColour $colour): RedirectResponse
    {
        $colour->delete();

        return redirect()->route('colours.index');
    }
}
