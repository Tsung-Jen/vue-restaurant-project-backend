<?php

namespace App\Reservations\Controllers;

use App\Http\Controllers\Controller;
use App\Reservations\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            // 1. 驗證
            $validated = $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'date' => 'required|date',
                'time' => 'required',
                'guests' => 'required|integer|min:1',
                'note' => 'nullable|string',
            ]);

            // 2. 商業邏輯：時段限制
            $count = Reservation::where('date', $validated['date'])
                ->where('time', $validated['time'])
                ->count();

            if ($count >= 5) {
                return response()->json([
                    'errors' => [
                        'time' => ['該時段已額滿']
                    ]
                ], 422);
            }

            // 3. 建立資料
            $reservation = Reservation::create($validated);

            return response()->json([
                'success' => true,
                'data' => $reservation
            ], 201);
        } catch (\Throwable $e) {

            Log::error($e);

            return response()->json([
                'message' => '系統發生錯誤，請稍後再試'
            ], 500);
        }
    }
}
