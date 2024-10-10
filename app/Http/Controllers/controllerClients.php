<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class controllerClients extends Controller
{
    public function clients()
    {
        // Retrieve all the stored clients
        $clients = Clients::all();

        // Pass the data to the view
        return view('company.clients', compact('clients'));
    }

    public function storeClients(Request $request)
    {
        // Validate the incoming data
        $data = $request->validate([
            'name' => 'required|string|max:100|unique:clients',
            'age' => 'required|integer',
            'address' => 'required|string|max:100',
            'sex' => 'required|string|in:Male,Female,Lalaki,Babae|max:6',
        ]);

        // Store the data in the modelClients
        Clients::create($data);

        // Optionally return a response or redirect
        return redirect()->route('company.infos')->with('success', 'Client information saved successfully!');
    }

    // Add the missing infos method
    public function infos()
    {
        // Retrieve all clients
        $clients = Clients::all();

        // Return view with clients data
        return view('company.infos', compact('clients'));
    }
}
