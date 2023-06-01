<?php

namespace App\Http\Controllers;

use App\Models\CatGender;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CatGenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $genders = CatGender::all();
        return view('cat-gender.index', compact('genders'));
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
            'gender_name' => 'required|string|max:255',
        ]);

        CatGender::create($validated);

        return redirect()->route('genders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CatGender $catGender)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CatGender $gender): View
    {
        return view('cat-gender.edit', compact('rank'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CatGender $gender): RedirectResponse
    {
        $validated = $request->validate([
            'gender_name' => 'required|string|max:255',
        ]);

        $gender->update($validated);

        return redirect()->route('genders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CatGender $gender): RedirectResponse
    {
        $gender->delete();

        return redirect()->route('genders.index');
    }
}
