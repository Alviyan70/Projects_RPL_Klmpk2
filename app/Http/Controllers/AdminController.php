<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Message; // Tambahkan ini untuk model Message
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Tambahkan ini untuk hashing password
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    // Method untuk menampilkan halaman utama admin
    public function index()
    {
        return view('admin.rooms.index'); // Sesuaikan dengan nama view yang Anda gunakan
    }

    // Method untuk menampilkan halaman dashboard
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Method untuk menampilkan daftar kamar (halaman index)
    public function roomsIndex()
    {
        $rooms = Room::all();
        return view('admin.rooms.index', compact('rooms'));
    }

    // Method untuk menampilkan form untuk membuat kamar baru
    public function roomsCreate()
    {
        return view('admin.rooms.create');
    }

    // Method untuk menyimpan kamar baru ke database
    public function roomsStore(Request $request)
    {
        $request->validate([
            'room_number' => 'required|string|max:10|unique:rooms',
            'room_type' => 'required|string|max:50',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'capacity' => 'required|integer',
            'status' => 'required|in:available,booked,maintenance',
        ]);

        Room::create($request->all());

        return redirect()->route('admin.rooms.index')->with('success', 'Room created successfully.');
    }

    // Method untuk menampilkan detail kamar
    public function roomsShow(Room $room)
    {
        return view('admin.rooms.show', compact('room'));
    }

    // Method untuk menampilkan form untuk mengedit kamar
    public function roomsEdit(Room $room)
    {
        return view('admin.rooms.edit', compact('room'));
    }

    // Method untuk memperbarui kamar di database
    public function roomsUpdate(Request $request, Room $room)
    {
        $request->validate([
            'room_number' => 'required|string|max:10|unique:rooms,room_number,' . $room->id,
            'room_type' => 'required|string|max:50',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'capacity' => 'required|integer',
            'status' => 'required|in:available,booked,maintenance',
        ]);

        $room->update($request->all());

        return redirect()->route('admin.rooms.index')->with('success', 'Room updated successfully.');
    }

    // Method untuk menghapus kamar dari database
    public function roomsDestroy(Room $room)
    {
        $room->delete();

        return redirect()->route('admin.rooms.index')->with('success', 'Room deleted successfully.');
    }

    // Method untuk menampilkan daftar booking
    public function bookingsIndex()
    {
        $bookings = Booking::all();
        return view('admin.bookings.index', compact('bookings'));
    }

    // Method untuk menampilkan form untuk membuat booking baru
    public function bookingsCreate()
    {
        return view('admin.bookings.create');
    }

    // Method untuk menyimpan booking baru ke database
    public function bookingsStore(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date',
            'total_price' => 'required|numeric',
            'status' => 'required|in:pending,confirmed,canceled',
        ]);

        Booking::create($request->all());

        return redirect()->route('admin.bookings.index')->with('success', 'Booking created successfully.');
    }

    // Method untuk menampilkan detail booking
    public function bookingsShow(Booking $booking)
    {
        return view('admin.bookings.show', compact('booking'));
    }

    // Method untuk menampilkan form untuk mengedit booking
    public function bookingsEdit(Booking $booking)
    {
        return view('admin.bookings.edit', compact('booking'));
    }

    // Method untuk memperbarui booking di database
    public function bookingsUpdate(Request $request, Booking $booking)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date',
            'total_price' => 'required|numeric',
            'status' => 'required|in:pending,confirmed,canceled',
        ]);

        $booking->update($request->all());

        return redirect()->route('admin.bookings.index')->with('success', 'Booking updated successfully.');
    }

    // Method untuk menghapus booking dari database
    public function bookingsDestroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('admin.bookings.index')->with('success', 'Booking deleted successfully.');
    }

    // Method untuk menampilkan halaman manajemen pengguna
    public function usersIndex()
    {
        $users = User::all(); // Mengambil data nyata dari database
        return view('admin.users.index', compact('users'));
    }

    // Method untuk menampilkan form untuk membuat user baru
    public function usersCreate()
    {
        return view('admin.users.create');
    }

    // Method untuk menyimpan user baru ke database
    public function usersStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string|in:admin,user',
        ]);

        try {
            // Jika `email_verified_at` dan `remember_token` diatur otomatis
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
            $user->email_verified_at = now(); // Mengatur waktu verifikasi email saat ini
            $user->remember_token = Str::random(10); // Menggenerate remember token
            $user->save();

            return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
        } catch (QueryException $e) {
            // Menangani duplikasi email
            if ($e->errorInfo[1] == 1062) {
                return back()->withErrors(['email' => 'Email already exists. Please use a different email.'])->withInput();
            }
            return back()->withErrors(['error' => 'An unexpected error occurred.'])->withInput();
        }
    }

    // Method untuk menampilkan detail user
    public function usersShow(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    // Method untuk menampilkan form untuk mengedit user
    public function usersEdit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Metode untuk memperbarui pengguna di database
    public function usersUpdate(Request $request, User $user) {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:100|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'role' => 'required|string|in:user,admin',
        ]);
    
        // Debugging nilai role yang diterima
        Log::info('Role value:', ['role' => $request->role]);
    
        // Perbarui data pengguna
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->role = $request->role;
        $user->save();
    
        // Redirect dengan pesan sukses
        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    // Method untuk menghapus user dari database
    public function usersDestroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }

    // Method untuk menampilkan halaman manajemen pesan
    public function messageIndex()
    {
        $messages = Message::all();
        return view('admin.message.index', compact('messages'));
    }

    // Method untuk menampilkan form untuk membuat pesan baru
    public function messageCreate()
    {
        return view('admin.message.create');
    }

    // Method untuk menyimpan pesan baru ke database
    public function messageStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:100',
            'message' => 'required|string',
        ]);

        Message::create($request->all());

        return redirect()->route('admin.message.index')->with('success', 'Message created successfully.');
    }

    // Method untuk menampilkan detail pesan
    public function messageShow(Message $message)
    {
        return view('admin.message.show', compact('message'));
    }

    // Method untuk menampilkan form untuk mengedit pesan
    public function messageEdit(Message $message)
    {
        return view('admin.message.edit', compact('message'));
    }

    // Method untuk memperbarui pesan di database
    public function messageUpdate(Request $request, Message $message)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:100',
            'message' => 'required|string',
        ]);

        $message->update($request->all());

        return redirect()->route('admin.message.index')->with('success', 'Message updated successfully.');
    }

    // Method untuk menghapus pesan dari database
    public function messageDestroy(Message $message)
    {
        $message->delete();

        return redirect()->route('admin.message.index')->with('success', 'Message deleted successfully.');
    }


    // Method untuk menampilkan halaman pengaturan
    public function settings()
    {
        return view('admin.settings');
    }

    // Method untuk logout
    // public function logout()
    // {
    //     auth()->logout();
    //     return redirect()->route('login');
    // }
}
