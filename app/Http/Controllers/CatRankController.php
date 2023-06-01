<?php

namespace App\Http\Controllers;

use App\Models\CatRank;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CatRankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $ranks = CatRank::all();
        return view('cat-rank.index', compact('ranks'));
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
            'rank_name' => 'required|string|max:255',
        ]);

        CatRank::create($validated);

        return redirect()->route('ranks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CatRank $rank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CatRank $rank): View
    {
        return view('cat-rank.edit', compact('rank'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CatRank $rank): RedirectResponse
    {
       $validated = $request->validate([
            'rank_name' => 'required|string|max:255',
        ]);

        $rank->update($validated);

        return redirect()->route('ranks.index');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CatRank $rank): RedirectResponse
    {
        $rank->delete();

        return redirect()->route('ranks.index');
    }
}
