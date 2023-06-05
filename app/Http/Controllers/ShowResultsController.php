<?php

namespace App\Http\Controllers;

use App\Models\ShowResults;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Cat;
use App\Models\CatShow;

class ShowResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $cats = Cat::all();
        $shows = CatShow::all();
        $results = ShowResults::all();
        return view('show-results.index', compact('results', 'cats', 'shows'));
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
            'cat_id' => 'required|integer',
            'show_id' => 'required|integer',
            'placement' => 'required|string|max:255',
            'score' => 'required|integer',
        ]);

        ShowResults::create($validated);

        return redirect()->route('results.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowResults $results): View
    {
        $cats = Cat::all();
        $shows = CatShow::all();
        return view('show-results.view', compact('results', 'cats', 'shows'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShowResults $result): View
    {
        $cats = Cat::all();
        $shows = CatShow::all();
        return view('show-results.edit', compact('result', 'cats', 'shows'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShowResults $result): RedirectResponse
    {
        $validated = $request->validate([
            'cat_id' => 'required|integer',
            'show_id' => 'required|integer',
            'placement' => 'required|string|max:255',
            'score' => 'required|integer',
        ]);

        $result->update($validated);

        return redirect()->route('results.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShowResults $results): RedirectResponse
    {
        $results->delete();

        return redirect()->route('results.index');
    }
}
