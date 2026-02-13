<?php

use Illuminate\Support\Facades\Route;
use App\Reservations\Controllers\ReservationController;

// Route::prefix('api')
//     ->middleware('api')
//     ->group(function () {
//         Route::post('/reservations', [ReservationController::class, 'store']);
//     });

Route::post('/reservations', [ReservationController::class, 'store']);

Route::get("/ping", function () {
    return "pong";
});
