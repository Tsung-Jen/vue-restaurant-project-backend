<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|string',
            'guests' => 'required|integer|min:1',
            'note' => 'nullable|string',
        ]);

        $reservation = Reservation::create($validated);

        return response()->json([
            'success' => true,
            'data' => $reservation,
        ]);
    }
}
