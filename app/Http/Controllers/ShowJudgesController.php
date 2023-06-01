<?php

namespace App\Http\Controllers;

use App\Models\ShowJudges;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\CatCouncil;
use App\Models\CatShow;


class ShowJudgesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $judges = ShowJudges::all();
        $councils = CatCouncil::all();
        return view('show-judge.index', compact(['judges', 'councils']));
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
            'judge_name' => 'required|string|max:255',
            'judge_expertise' => 'required|string|max:255',
            'council_id' => 'required|integer',
        ]);

        ShowJudges::create($validated);

        return redirect()->route('judges.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowJudges $showJudges)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShowJudges $judge): View
    {
        
        $councils = CatCouncil::all();
        //$shows = CatShow::all($judge->id, ['id', 'show_name']);
      
        return view('show-judge.edit', compact(['judge', 'councils']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShowJudges $judge): RedirectResponse
    {
        $validated = $request->validate([
            'judge_name' => 'required|string|max:255',
            'judge_expertise' => 'required|string|max:255',
            'council_id' => 'required|integer',
        ]);

        $judge->update($validated);

        return redirect()->route('judges.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShowJudges $judge)
    {
        $judge->delete(); 

        return redirect()->route('judges.index');
    }
}
