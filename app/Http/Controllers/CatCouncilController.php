<?php

namespace App\Http\Controllers;

use App\Models\CatCouncil;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CatCouncilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $states = ['Brisbane', 'New South Wales', 'Victoria', 'South Australia', 'Western Australia', 'Tasmania', 'Northern Territory', 'Australian Capital Territory'];
        $councils = CatCouncil::all();
        return view('cat-council.index', compact(['councils', 'states']));
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
            'council_name' => 'required|string|max:255',
            'council_short_name' => 'required|string|max:255',
            'council_img' => 'required|string|max:255',
            'council_address' => 'required|string|max:255',
            'council_state' => 'required|string|max:255',
            'council_email' => 'required|string|max:255',
            'council_phone' => 'required|string|max:255',
            'council_url' => 'required|string|max:255',
        ]);
        // add user id
        $validated['user_id'] = auth()->id();
        
        CatCouncil::create($validated);

        return redirect()->route('councils.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CatCouncil $catCouncil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CatCouncil $council): View
    {
        $states = ['Brisbane', 'New South Wales', 'Victoria', 'South Australia', 'Western Australia', 'Tasmania', 'Northern Territory', 'Australian Capital Territory'];
        return view('cat-council.edit', compact(['council', 'states']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CatCouncil $council): RedirectResponse
    {
        $validated = $request->validate([
            'council_name' => 'required|string|max:255',
            'council_short_name' => 'required|string|max:255',
            'council_img' => 'required|string|max:255',
            'council_address' => 'required|string|max:255',
            'council_state' => 'required|string|max:255',
            'council_email' => 'required|string|max:255',
            'council_phone' => 'required|string|max:255',
            'council_url' => 'required|string|max:255',
        ]);
        // add user id
        $validated['user_id'] = auth()->id();
        $council->update($validated);

        return redirect()->route('councils.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CatCouncil $council): RedirectResponse
    {
        $council->delete();

        return redirect()->route('councils.index');
    }
}
