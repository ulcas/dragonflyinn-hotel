<?php

use App\Http\Controllers\QuartoController;
use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;

Route::apiResource('reserva', ReservaController::class);
Route::apiResource('quarto', QuartoController::class);