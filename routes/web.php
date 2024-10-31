<?php

use App\Http\Controllers\controllerClients;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clients', [controllerClients::class, 'clients'])->name('companies.clients');
Route::post('/companies/clients', [controllerClients::class, 'store'])->name('storeClients');
Route::get('/companies/infos', [controllerClients::class, 'infos'])->name('companies.infos');


// Route to show the form for adding a new client
Route::get('companies/add', [controllerClients::class, 'add'])->name('clients.add');


// Route to store a new client
Route::post('/companies/add', [controllerClients::class, 'stores'])->name('clients.store');

// Route to Edit client
Route::get('/clients/{id}/edit', [controllerClients::class, 'edit'])->name('clients.edit');
// Route to Update client
Route::put('/clients/{id}', [controllerClients::class, 'update'])->name('clients.update');
// Route to Delete client
Route::delete('/clients/{id}', [controllerClients::class, 'destroy'])->name('clients.delete');
