<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;
use App\Models\CatGender;
use Illuminate\Support\Str;

class CatController extends Controller
{
    public function index()
    {
        // Retrieve all cats from the database
        $cats = Cat::all();

        // Pass the retrieved cats to the view
        return view('cats.index', compact('cats'));
    }

    public function show($cat_id)
    {
        // Retrieve the specific cat by ID from the database
        $cat = Cat::findOrFail($cat_id);

        // Pass the retrieved cat to the view
        return view('cats.show', compact('cat'));
    }

    public function create()
    {
        $cat = new Cat();
        return view('cats.show', compact('cat'));
    }

    public function store(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            // Define validation rules for each field in the catForm
            'cat.name' => 'required|string|max:255',
            'cat.date_of_birth' => 'required|date',
            'cat.bio' => 'nullable|string',
            'cat.registration' => 'nullable|string|max:255',
            'cat.breeder_name' => 'nullable|string|max:255',
            'cat.sire_name' => 'nullable|string|max:255',
            'cat.dam_name' => 'nullable|string|max:255',
            'cat.gender' => 'required|integer',
            'cat.breed' => 'required|integer',
            'cat.colour' => 'required|integer',
            'cat.type' => 'required|integer',
        ]);

        // Create a new cat instance with the validated data
        $cat = Cat::create($validatedData['cat']);

        // Redirect to the show page for the newly created cat
        return redirect()->route('cats.show', $cat->id);
    }

    public function edit($cat_id)
    {
        // Retrieve the specific cat by ID from the database
        $cat = Cat::findOrFail($cat_id);
       
        // Show the form for editing the cat
        return view('cats.edit', compact('cat'));
    }

    public function update(Request $request, $cat_id)
    {
        // Retrieve the specific cat by ID from the database
        $cat = Cat::findOrFail($cat_id);

        // Validate the input data
        $validatedData = $request->validate([
            // Define validation rules for each field
        ]);

        // Update the cat with the validated data
        $cat->update($validatedData);

        // Redirect to the show page for the updated cat
        return redirect()->route('cats.index', $cat->id);
    }

    public function destroy($cat_id)
    {
        // Retrieve the specific cat by ID from the database
        $cat = Cat::findOrFail($cat_id);

        // Delete the cat
        $cat->delete();

        // Redirect to the index page for cats
        return redirect()->route('cats.index');
    }
}
