<?php

namespace App\Actions\Booking;

use App\Contracts\Booking\ShowBookingActionContract;
use App\Models\Booking;
use Illuminate\Http\JsonResponse;

class ShowBookingAction implements ShowBookingActionContract
{
    public function show($id): JsonResponse
    {
        $booking = Booking::findOrFail($id);
        return response()->json(['booking' => $booking], 200);
    }
}
