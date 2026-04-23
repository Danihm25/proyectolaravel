<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\ContadorController;

Route::resource('equipos', EquipoController::class);
Route::resource('contadores', ContadorController::class);

Route::get('/', function () {
    return view('welcome');

});
