<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class controllerClients extends Controller
{

    // function clients main page of the website
    // Using the function clients and store, reload and submitting new clients
    public function clients()
    {
        // Retrieve all the stored clients
        $clients = Clients::all();

        // Pass the data to the view
        return view('companies.clients', compact('clients'));
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

        // Return a response or redirect
        return redirect()->route('companies.clients')->with('success', 'Client information saved successfully!');
    }

        // Add the missing showClients method
        
        public function infos()
        {
            // Retrieve all clients
            $clients = Clients::all();
            // Return view with clients data
            return view('companies.infos', compact('clients'));
        }

        
        // Adding Clients
        // Using the function add and stores, to direct the page in the companies.infos after adding another clients
        public function add()
        {
            // Return the view for adding a new client
            return view('companies.add');
        }
        public function stores(Request $request)
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
            // Return a response or redirect
            return redirect()->route('companies.infos')->with('success', 'Client information Add successfully!');
        }



        // Edit Clients

        public function edit($id) {
            $clients = Clients::find($id);
            return view('companies.edit', compact('clients'));
        }

        // Update Clients

        public function update(Request $request, $id) {
            $clients = Clients::find($id);
            $clients->update($request->all());
            return redirect()->route('companies.infos')->with('success', 'Client information updated successfully!');
        }



        // Delete Clients

        public function destroy($id) {
            $clients = Clients::find($id);
            $clients->delete();
            return redirect()->route('companies.infos')->with('success', 'Client deleted successfully!');
        }
}
