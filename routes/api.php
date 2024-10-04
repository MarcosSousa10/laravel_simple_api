<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::get('/status', [ApiController::class, 'status']);
Route::get('/clients', [ApiController::class, 'clients']);
Route::get('/clients-by-id/{id}', [ApiController::class, 'clientsById']);
Route::post('/client', [ApiController::class, 'client']);
