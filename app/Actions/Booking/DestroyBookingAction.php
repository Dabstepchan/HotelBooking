<?php

namespace App\Actions\Booking;

use App\Contracts\Booking\DestroyBookingActionContract;
use App\Models\Booking;
use Illuminate\Http\JsonResponse;

class DestroyBookingAction implements DestroyBookingActionContract
{
    public function destroy($id): JsonResponse
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return response()->json(['message' => 'Booking deleted successfully'], 200);
    }
}
