<?php

namespace App\Http\Controllers;

use App\Models\ShowSponsor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShowSponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $sponsors = ShowSponsor::all();
        return view('show-sponsor.index', compact('sponsors'));
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
            'sponsor_name' => 'required|string|max:255',
            'sponsor_img' => 'required|string|max:255',
            'sponsor_url' => 'required|string|max:255',
        ]);

        ShowSponsor::create($validated);

        return redirect()->route('sponsors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowSponsor $showSponsor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShowSponsor $sponsor): View
    {
        return view('show-sponsor.edit', compact('sponsor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShowSponsor $sponsor): RedirectResponse
    {
        $validated = $request->validate([
            'sponsor_name' => 'required|string|max:255',
            'sponsor_img' => 'required|string|max:255',
            'sponsor_url' => 'required|string|max:255',
        ]);

        $sponsor->update($validated);

        return redirect()->route('sponsors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShowSponsor $sponsor): RedirectResponse
    {
        $sponsor->delete();

        return redirect()->route('sponsors.index');
    }
}
