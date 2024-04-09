<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return response()->json(['bookings' => $bookings], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
        ]);

        $booking = Booking::create($request->all());

        return response()->json(['booking' => $booking], 201);
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return response()->json(['booking' => $booking], 200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'user_id' => 'exists:users,id',
            'room_id' => 'exists:rooms,id',
            'check_in' => 'date',
            'check_out' => 'date|after:check_in',
            'guests' => 'integer|min:1',
            'total_price' => 'numeric|min:0',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update($request->all());

        return response()->json(['booking' => $booking], 200);
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return response()->json(['message' => 'Booking deleted successfully'], 200);
    }
}
