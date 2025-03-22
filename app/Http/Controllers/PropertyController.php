<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
class PropertyController extends Controller
{
    public function create()
    {
        return view('properties.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'bedrooms' => 'required|integer|min:1',
            'bathrooms' => 'required|numeric|min:1',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'type' => 'required|string|in:House,Apartment',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        $photoPath = $request->file('photo')->store('public/uploads');

        // Create a new Property model instance and save data
        $property = new Property();
        $property->title = $validatedData['title'];
        $property->description = $validatedData['description'];
        $property->bedrooms = $validatedData['bedrooms'];
        $property->bathrooms = $validatedData['bathrooms'];
        $property->location = $validatedData['location'];
        $property->price = $validatedData['price'];
        $property->type = $validatedData['type'];
        $property->photo = $photoPath; // Store the image path
        $property->save();

        // Redirect with a success flash message
        return redirect('/properties')->with('success', 'Property added successfully!');
    }

    public function index()
    {
        $properties = Property::all();
        return view('properties.index', compact('properties'));
    }

    public function show($id)
    {
        $property = Property::findOrFail($id);
        return view('properties.show', compact('property'));
    }
}