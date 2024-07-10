<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function booking(Request $request)
    {
        Booking::create([
            'user_id' => Auth::user()->id,
            'room_id' => $request->room_id,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'guest' => $request->guest,
            'total_price' => $request->total_price,
            'total_room' => $request->total_room
        ]);

        return redirect()->route('booking.success')->with('success', 'Reservasi berhasil');
    }

    public function bookingSuccess()
    {
        return view('landing.booking_success');
    }
}
