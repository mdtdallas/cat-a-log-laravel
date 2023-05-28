<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;

class CatController extends Controller
{
    public function index()
    {
        // Retrieve all cats from the database
        $cats = Cat::all();

        // Pass the retrieved cats to the view
        return view('cats.index', compact('cats'));
    }

    public function show($id)
    {
        // Retrieve the specific cat by ID from the database
        $cat = Cat::findOrFail($id);

        // Pass the retrieved cat to the view
        return view('cats.show', compact('cat'));
    }

    public function create()
    {
        // Show the form for creating a new cat
        return view('cats.create');
    }

    public function store(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            // Define validation rules for each field
        ]);

        // Create a new cat instance with the validated data
        $cat = Cat::create($validatedData);

        // Redirect to the show page for the newly created cat
        return redirect()->route('cats.show', $cat->id);
    }

    public function edit($id)
    {
        // Retrieve the specific cat by ID from the database
        $cat = Cat::findOrFail($id);

        // Show the form for editing the cat
        return view('cats.edit', compact('cat'));
    }

    public function update(Request $request, $id)
    {
        // Retrieve the specific cat by ID from the database
        $cat = Cat::findOrFail($id);

        // Validate the input data
        $validatedData = $request->validate([
            // Define validation rules for each field
        ]);

        // Update the cat with the validated data
        $cat->update($validatedData);

        // Redirect to the show page for the updated cat
        return redirect()->route('cats.show', $cat->id);
    }

    public function destroy($id)
    {
        // Retrieve the specific cat by ID from the database
        $cat = Cat::findOrFail($id);

        // Delete the cat
        $cat->delete();

        // Redirect to the index page for cats
        return redirect()->route('cats.index');
    }
}
