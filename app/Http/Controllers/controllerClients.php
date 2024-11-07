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
        return view('companies.clients', ['clients' => $clients]);;
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


        public function infos(Request $request)
        {
            // Check the request for sort order, default to ascending if not specified
            $sortOrder = $request->input('sort', 'asc');

            // Get the search term from the request
            $searchTerm = $request->input('search');

            // Determine which page to display, default to 1 if no page parameter is provided
            $page = $request->input('page', 1);
            $recordsPerPage = 25;
            $offset = ($page - 1) * $recordsPerPage;

            // Retrieve clients, apply sorting, filtering, and limit the results to 20 per page
            $clientsQuery = clients::when($searchTerm, function ($query, $searchTerm) {
                return $query->where('name', 'like', '%' . $searchTerm . '%')
                                ->orWhere('address', 'like', '%' . $searchTerm . '%');
            });

            // get the total clients
            $totalClients = $clientsQuery->count();

            // Get the Clients for the current page
            $clients = $clientsQuery->orderBy('name', $sortOrder)
                                    ->skip($offset)
                                    ->take($recordsPerPage)
                                    ->get();

            // Return view with clients data, search term, page, and records per page
            return view('companies.infos', [
                'clients' => $clients,
                'searchTerm' => $searchTerm,
                'page' => $page,
                'recordsPerPage' => $recordsPerPage,
                'totalClients' => $totalClients, //counts total clients
            ]);
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
    $clients = Clients::findOrFail($id);
    return view('companies.edit', ['clients' => $clients]);

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
