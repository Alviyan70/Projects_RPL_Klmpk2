@extends('components.master')

@section('content')
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="top-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="tn-left">
                            <li><i class="fa fa-phone"></i>(+62) 85877883339</li>
                            <li><i class="fa fa-envelope"></i> projectRPL@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="tn-right">
                            <div class="top-social">
                            <a href="{{ route('logout') }}" class="bk-btn">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="{{ route('dashboard') }}">
                                <img src="{{ asset('img/nevatel.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li><a href="{{ route('rooms.index') }}">Rooms</a></li>
                                    <li class="active"><a href="{{ route('bookings.index') }}">Bookings</a></li>
                                    <li><a href="{{ route('users.index') }}">Users</a></li>
                                    <li><a href="{{ route('message.index') }}">Users Message</a></li>
                                </ul>
                            </nav>
                            <div class="nav-right search-switch">
                                <i class="icon_search"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <h1>Bookings</h1>
    <a class="btn-create" href="{{ route('admin.bookings.create') }}">Create Booking</a>
    <table class="rooms-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Room ID</th>
                <th>Check In Date</th>
                <th>Check Out Date</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->user_id }}</td>
                    <td>{{ $booking->room_id }}</td>
                    <td>{{ $booking->check_in_date }}</td>
                    <td>{{ $booking->check_out_date }}</td>
                    <td>{{ $booking->total_price }}</td>
                    <td>{{ $booking->status }}</td>
                    <td>
                        <a class="btn-show" href="{{ route('admin.bookings.show', $booking->id) }}">Show</a>
                        <a class="btn-edit" href="{{ route('admin.bookings.edit', $booking->id) }}">Edit</a>
                        <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn-delete" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
