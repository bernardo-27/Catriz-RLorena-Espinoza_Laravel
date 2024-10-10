<?php

use App\Http\Controllers\controllerClients;
use App\Http\Controllers\itemsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clients', [controllerClients::class, 'clients'])->name('company.clients');
Route::get('/company/infos', [controllerClients::class, 'infos'])->name('company.infos');
Route::post('/company/clients', [controllerClients::class, 'storeClients'])->name('storeClients');