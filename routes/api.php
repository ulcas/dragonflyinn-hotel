<?php

use App\Http\Controllers\QuartoController;
use App\Http\Controllers\ReservaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/', function () {
    return ['welcome'];
});


Route::apiResource('reserva', ReservaController::class);
Route::apiResource('quarto', QuartoController::class);