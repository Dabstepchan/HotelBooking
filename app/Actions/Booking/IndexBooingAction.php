<?php

namespace App\Actions\Booking;

use App\Contracts\Booking\IndexBookingActionContract;
use App\Models\Booking;
use Illuminate\Http\JsonResponse;

class IndexBookingAction implements IndexBookingActionContract
{
    public function index(): JsonResponse
    {
        $bookings = Booking::all();
        return response()->json(['bookings' => $bookings], 200);
    }
}
