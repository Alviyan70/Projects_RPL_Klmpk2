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
                                    <li class="active"><a href="{{ route('rooms.index') }}">Rooms</a></li>
                                    <li><a href="{{ route('bookings.index') }}">Bookings</a></li>
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
    <h1>Rooms</h1>
    <a class="btn-create" href="{{ route('admin.rooms.create') }}">Create Room</a>
    <table class="rooms-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Room Number</th>
                <th>Room Type</th>
                <th>Size</th>
                <th>Bed</th>
                <th>Price</th>
                <th>Description</th>
                <th>Capacity</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
                <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->room_number }}</td>
                    <td>{{ $room->room_type }}</td>
                    <td>{{ $room->size }}</td>
                    <td>{{ $room->bed }}</td>
                    <td>{{ $room->price }}</td>
                    <td>{{ $room->description }}</td>
                    <td>{{ $room->capacity }}</td>
                    <td>{{ $room->status }}</td>
                    <td>
                        <a class="btn-show" href="{{ route('admin.rooms.show', $room->id) }}">Show</a>
                        <a class="btn-edit" href="{{ route('admin.rooms.edit', $room->id) }}">Edit</a>
                        <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" style="display:inline;">
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
