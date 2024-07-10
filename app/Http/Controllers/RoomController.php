<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('admin.rooms.index', compact('rooms'));
    }
    
    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_type' => 'required|string|max:255',
            'room_number' => 'required|integer',
            'size' => 'required|string|max:6',
            'bed' => 'required|integer',
            'description' => 'required',
            'price' => 'required|integer',
            'capacity' => 'required|integer',
            'status' => 'required|in:Available,Booked,Maintenance',
        ]);

        Room::create($request->all());
        return redirect()->route('admin.rooms.index')
                         ->with('success', 'Room created successfully.');
    }

    public function edit(Room $room)
    {
        return view('admin.rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_type' => 'required|string|max:255',
            'room_number' => 'required|integer',
            'size' => 'required|string|max:6',
            'bed' => 'required|integer',
            'description' => 'required',
            'price' => 'required|integer',
            'capacity' => 'required|integer',
            'status' => 'required|in:Available,Booked,Maintenance',
        ]);

        $room->update($request->all());
        return redirect()->route('admin.rooms.index')
                         ->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('admin.rooms.index')
                         ->with('success', 'Room deleted successfully.');
    }

    // New method for the frontend rooms view
    public function showRooms()
    {
        $rooms = Room::all();
        return view('landing.rooms', compact('rooms'));
    }

    public function show($id)
    {
        $room = Room::findOrFail($id);
        return view('landing.room_details', compact('room'));
    }
}
