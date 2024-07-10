<?php

// app/Http/Controllers/HotelController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class HotelController extends Controller
{
    public function checkAvailability(Request $request)
    {
        // Ambil data dari request
        $checkIn = $request->input('check-in');
        $checkOut = $request->input('check-out');
        $guests = $request->input('guest');
        $rooms = $request->input('room');

        // Logika untuk mencari ketersediaan kamar
        $availableRooms = Room::where('status', 'Available')->get();

        return view('landing.available', compact('availableRooms'));
    }
}