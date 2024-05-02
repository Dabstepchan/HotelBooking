<?php

namespace App\Contracts\Booking;

use Illuminate\Http\JsonResponse;

interface IndexBookingActionContract
{
    public function index(): JsonResponse;
}
