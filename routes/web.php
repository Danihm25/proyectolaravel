<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;

Route::resource('equipos', EquipoController::class);

Route::get('/', function () {
    return view('welcome');

});
