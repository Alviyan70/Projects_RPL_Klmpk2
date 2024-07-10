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
<div class="card-form">
    <div class="card">                
        <div class="card-header">Room Details</div>
        <div class="card-body">
            <div class="form-group">
                <label for="room_number">Room Number</label>
                <input type="text" name="room_number" id="room_number" class="form-control" value="{{ $room->room_number }}" readonly>
            </div>

            <div class="form-group">
                <label for="room_type">Room Type</label>
                <input type="text" name="room_type" id="room_type" class="form-control" value="{{ $room->room_type }}" readonly>
            </div>

            <div class="form-group">
                <label for="size">Ukuran</label>
                <textarea name="size" id="size" class="form-control" readonly>{{ $room->size }}</textarea>
            </div>

            <div class="form-group">
                <label for="bed">Bed</label>
                <textarea name="bed" id="bed" class="form-control" readonly>{{ $room->bed }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" id="price" class="form-control" value="{{ $room->price }}" readonly>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" readonly>{{ $room->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="capacity">Capacity</label>
                <input type="text" name="capacity" id="capacity" class="form-control" value="{{ $room->capacity }}" readonly>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" name="status" id="status" class="form-control" value="{{ $room->status }}" readonly>
            </div>

            <a href="{{ route('admin.rooms.edit', $room->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this room?')">Delete</button>
            </form>
            <a href="{{ route('admin.rooms.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
