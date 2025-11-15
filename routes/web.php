<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EspacioController;
use App\Http\Controllers\SolicitanteController;
use App\Http\Controllers\ReservaController;

Route::get('/', function () {
    return redirect()->route('reservas.index');
});

Route::resource('espacios', EspacioController::class);

Route::resource('solicitantes', SolicitanteController::class);

Route::resource('reservas', ReservaController::class);
