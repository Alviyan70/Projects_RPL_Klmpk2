<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\BookingController;


Route::get('register', function () {
    return view('landing.register');
})->name('register');

Route::post('register', [AuthController::class, 'register']);

Route::get('login', function () {
    return view('landing.login');
})->name('login');

Route::post('login', [AuthController::class, 'login']);

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('home', function () {
    return view('landing.home');
})->name('home');

// rute untuk halaman admin dan landing
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware('auth');

Route::get('/landing/home', function () {
    return view('landing.home');
})->name('landing.home')->middleware('auth');


Route::post('/booking-now', [BookingController::class, 'booking'])->name('booking.now')->middleware('auth');
Route::get('/booking-success', [BookingController::class, 'bookingSuccess'])->name('booking.success');

Route::post('/messages/submit', [MessagesController::class, 'submitMessage'])->name('messages.submit');

Route::get('/search', [LandingController::class, 'search'])->name('search');

// Halaman utama users
Route::get('/', [LandingController::class, 'index'])->name('home');

// Halaman rooms
Route::get('/rooms', [LandingController::class, 'rooms'])->name('rooms');
Route::get('/rooms', [RoomController::class, 'showRooms'])->name('rooms');

// Halaman room_details
Route::get('/room_details', [LandingController::class, 'room_details'])->name('room_details');
Route::get('/room_details/{id}', [RoomController::class, 'show'])->name('room_details');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

// Halaman about us
Route::get('/about_us', [LandingController::class, 'about_us'])->name('about_us');

// Halaman contact
Route::get('/contact', [LandingController::class, 'contact'])->name('contact');

// Halaman login
Route::get('/login', [LandingController::class, 'login'])->name('login');

// Halaman register
Route::get('/register', [LandingController::class, 'register'])->name('register');

// Halaman available
Route::get('/available', [LandingController::class, 'checkAvailability'])->name('available');

Route::get('/check-availability', [LandingController::class, 'checkAvailability']);

// AdminController
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/rooms/index', [AdminController::class, 'roomsIndex'])->name('rooms.index');
Route::get('/bookings/index', [AdminController::class, 'bookingsIndex'])->name('bookings.index');
Route::get('/users/index', [AdminController::class, 'usersIndex'])->name('users.index');
Route::get('/message/index', [AdminController::class, 'messageIndex'])->name('message.index');

// Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

// CRUD operations for rooms
Route::get('admin/rooms', [AdminController::class, 'roomsIndex'])->name('admin.rooms.index');
Route::get('/admin/rooms/create', [AdminController::class, 'roomsCreate'])->name('admin.rooms.create');
Route::post('/admin/rooms', [AdminController::class, 'roomsStore'])->name('admin.rooms.store');
Route::get('/admin/rooms/{room}', [AdminController::class, 'roomsShow'])->name('admin.rooms.show');
Route::get('/admin/rooms/{room}/edit', [AdminController::class, 'roomsEdit'])->name('admin.rooms.edit');
Route::put('/admin/rooms/{room}', [AdminController::class, 'roomsUpdate'])->name('admin.rooms.update');
Route::delete('/admin/rooms/{room}', [AdminController::class, 'roomsDestroy'])->name('admin.rooms.destroy');


// CRUD operations for bookings
Route::get('/admin/bookings', [AdminController::class, 'bookingsIndex'])->name('admin.bookings.index');
Route::get('/admin/bookings/create', [AdminController::class, 'bookingsCreate'])->name('admin.bookings.create');
Route::post('/admin/bookings', [AdminController::class, 'bookingsStore'])->name('admin.bookings.store');
Route::get('/admin/bookings/{booking}', [AdminController::class, 'bookingsShow'])->name('admin.bookings.show');
Route::get('/admin/bookings/{booking}/edit', [AdminController::class, 'bookingsEdit'])->name('admin.bookings.edit');
Route::put('/admin/bookings/{booking}', [AdminController::class, 'bookingsUpdate'])->name('admin.bookings.update');
Route::delete('/admin/bookings/{booking}', [AdminController::class, 'bookingsDestroy'])->name('admin.bookings.destroy');

// CRUD operations for users
Route::get('/admin/users', [AdminController::class, 'usersIndex'])->name('admin.users.index');
Route::get('/admin/users/create', [AdminController::class, 'usersCreate'])->name('admin.users.create');
Route::post('/admin/users', [AdminController::class, 'usersStore'])->name('admin.users.store');
Route::get('/admin/users/{user}', [AdminController::class, 'usersShow'])->name('admin.users.show');
Route::get('/admin/users/{user}/edit', [AdminController::class, 'usersEdit'])->name('admin.users.edit');
Route::put('/admin/users/{user}', [AdminController::class, 'usersUpdate'])->name('admin.users.update');
Route::delete('/admin/users/{user}', [AdminController::class, 'usersDestroy'])->name('admin.users.destroy');

// CRUD operations for users message
Route::get('/admin/message', [AdminController::class, 'messageIndex'])->name('admin.message.index');    
Route::get('/admin/message/create', [AdminController::class, 'usersCreate'])->name('admin.message.create');
Route::post('/admin/message', [AdminController::class, 'messageStore'])->name('admin.message.store');
Route::get('/admin/message/{user}', [AdminController::class, 'messageShow'])->name('admin.message.show');
Route::get('/admin/message/{user}/edit', [AdminController::class, 'messageEdit'])->name('admin.message.edit');
Route::put('/admin/message/{user}', [AdminController::class, 'messageUpdate'])->name('admin.message.update');
Route::delete('/admin/message/{user}', [AdminController::class, 'messageDestroy'])->name('admin.message.destroy');

// Halaman pengaturan
Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');

// Logout
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

// // Route untuk halaman login
// Route::get('/login', [AdminController::class, 'login'])->name('login');
// Route::post('/login', [AdminController::class, 'authenticate'])->name('authenticate');

// Kamar Tersedia
Route::get('/available', [HotelController::class, 'checkAvailability'])->name('available');

