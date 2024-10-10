<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class itemsController extends Controller
{    public function index()
    {
        $clients = Clients::all();
        return view('items.index', compact('clients'));
    }

    // Show the form for creating a new item.
    public function create()
    {
        return view('items.create');
    }

    // Store a newly created item in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:clients',
            'age' => 'required|integer',
            'address' => 'required|string|max:100',
            'sex' => 'required|string|in:Male,Female,Lalaki,Babae|max:6',
        ]);

        Clients::create($request->all());

        return redirect()->route('items.index')->with('success', 'Clients created successfully.');
    }
}
