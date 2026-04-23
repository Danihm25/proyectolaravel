<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\ContadorController;
use App\Http\Controllers\EmpleadoController;

Route::resource('equipos', EquipoController::class);
Route::resource('contadores', ContadorController::class);
Route::resource('rrhh', EmpleadoController::class);

Route::get('/', function () {
    return view('welcome');

});
