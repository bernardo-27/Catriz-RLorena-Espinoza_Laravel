<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class clientsController extends Controller
{
    public function clients()
    {
        // Retrieve all the stored clients
        $clients = Clients::all();

        // Pass the data to the view
        return view('company.clients', compact('clients'));
    }

    public function store(Request $request)
    {
        // Validate the incoming data
        $data = $request->validate([
            'name' => 'required|string|max:100|unique:clients',
            'age' => 'required|integer',
            'address' => 'required|string|max:100',
            'sex' => 'required|string|in:Male,Female|max:6',
        ]);

        // Store the data in the modelClients
    Clients::create($data);

        // Optionally return a response or redirect
        return redirect()->route('infos')->with('success', 'Client information saved successfully!');
    }
}
