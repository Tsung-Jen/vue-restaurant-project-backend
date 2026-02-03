<?php

namespace App\Reservations\Controllers;

use App\Http\Controllers\Controller;
use App\Reservations\Requests\ReservationCreateRequest;
use App\Reservations\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function store(ReservationCreateRequest $request)
    {
        try {
            /** @var Reservation $reservation */
            $reservation = Reservation::create($request->validated());
            $reservation->save();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('reservations.errors.create_failed'),
            ], 500);
        }
        return response()->json([
            'success' => true,
            'data' => $reservation,
        ]);
    }
}
