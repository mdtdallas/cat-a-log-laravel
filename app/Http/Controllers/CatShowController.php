<?php

namespace App\Http\Controllers;

use App\Models\CatCouncil;
use App\Models\CatShow;
use App\Models\ShowJudges;
use App\Models\ShowSponsor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CatShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $judges = ShowJudges::all();
        $sponsors = ShowSponsor::all();
        $shows = CatShow::all();
        

        return view('cat-show.index', compact(['judges', 'sponsors', 'shows']));
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
            'show_name' => 'required|string|max:255',
            'show_date' => 'required|date',
            'show_entry_close' => 'required|date',
            'show_img' => 'file|max:1024', // Update validation rule to 'file' type
            'show_location' => 'required|string|max:255',
            'show_map' => 'required|string|max:1024',
            'show_rules' => 'file|max:1024', // Update validation rule to 'file' type
            'show_covid_plan' => 'file|max:1024', // Update validation rule to 'file' type
            'show_description' => 'required|string|max:1024',
        ]);

        $judges = ShowJudges::all();

        // Handle file uploads
        if ($request->hasFile('show_img')) {
            $showImg = $request->file('show_img');
            $showImgPath = $showImg->store('public');
            $validated['show_img'] = $showImgPath;
        }

        if ($request->hasFile('show_rules')) {
            $showRules = $request->file('show_rules');
            $showRulesPath = $showRules->store('public');
            $validated['show_rules'] = $showRulesPath;
        }

        if ($request->hasFile('show_covid_plan')) {
            $showCovidPlan = $request->file('show_covid_plan');
            $showCovidPlanPath = $showCovidPlan->store('public');
            $validated['show_covid_plan'] = $showCovidPlanPath;
        }
        
        $catShow = CatShow::create($validated);
        $judges = $request->input('judges', []);
        $catShow->assignedJudges()->sync($judges); // Assign judges to the cat show

        return redirect()->route('shows.index', compact('judges'))->with('success', 'Show created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(CatShow $show): View
    {
        $showId = $show->id; // Replace with the actual show ID
        $assignedJudges = CatShow::find($showId)->getAssignedJudgesWithShowId($showId);
        $councils = CatCouncil::all();
        //dd($assignedJudges);
        return view('cat-show.view', compact(['show', 'assignedJudges', 'councils']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CatShow $show): View
    {

        $judges = ShowJudges::all();
        return view('cat-show.edit', compact(['show', 'judges']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CatShow $show): RedirectResponse
    {
        $validated = $request->validate([
            'show_name' => 'required|string|max:255',
            'show_date' => 'required|date',
            'show_entry_close' => 'required|date',
            //'show_img' => 'required|file|max:1024', // Update validation rule to 'file' type
            'show_location' => 'required|string|max:255',
            'show_map' => 'required|string|max:255',
            //'show_rules' => 'required|file|max:1024', // Update validation rule to 'file' type
            //'show_covid_plan' => 'required|file|max:1024', // Update validation rule to 'file' type
            'show_description' => 'required|string|max:1024',
        ]);

        // Handle file uploads
        if ($request->hasFile('show_img')) {
            $showImg = $request->file('show_img');
            $showImgPath = $showImg->store('uploads', 'public');
            $validated['show_img'] = $showImgPath;
        }

        if ($request->hasFile('show_rules')) {
            $showRules = $request->file('show_rules');
            $showRulesPath = $showRules->store('uploads', 'public');
            $validated['show_rules'] = $showRulesPath;
        }

        if ($request->hasFile('show_covid_plan')) {
            $showCovidPlan = $request->file('show_covid_plan');
            $showCovidPlanPath = $showCovidPlan->store('uploads', 'public');
            $validated['show_covid_plan'] = $showCovidPlanPath;
        }

        $show->update($validated);

        return redirect()->route('shows.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CatShow $show): RedirectResponse
    {
        $show->delete();

        return redirect()->route('shows.index');
    }
}
