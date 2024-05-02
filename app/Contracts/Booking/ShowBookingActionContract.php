<?php

namespace App\Contracts\Booking;

use Illuminate\Http\JsonResponse;

interface ShowBookingActionContract
{
    public function show($id): JsonResponse;
}
