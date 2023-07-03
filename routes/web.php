<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas Especialidades
Route::get('/servicios', [App\Http\Controllers\ServicesController::class, 'index']);

Route::get('/servicios/create', [App\Http\Controllers\ServicesController::class, 'create']);
Route::get('/servicios/{services}/edit', [App\Http\Controllers\ServicesController::class, 'edit']);
Route::post('/servicios', [App\Http\Controllers\ServicesController::class, 'sendData']);

Route::put('/servicios/{services}', [App\Http\Controllers\ServicesController::class, 'update']);
Route::delete('/servicios/{services}', [App\Http\Controllers\ServicesController::class, 'destroy']);

//Ruta Nosotros
Route::resource('nosotros', 'App\Http\Controllers\UsController');

// Ruta Pacientes
Route::resource('pacientes', 'App\Http\Controllers\PatientController');
