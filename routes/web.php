<?php

use Illuminate\Support\Facades\Route;

// Route::prefix('api')
//     ->middleware('api')
//     ->group(function () {
//         Route::post('/reservations', [ReservationController::class, 'store']);
//     });

Route::get('/', function () {
    return view('welcome');
});

// Route::get("/api/ping", function () {
//     return "pong";
// });

// Route::post("/api/reservations", [ReservationController::class, 'store']);
