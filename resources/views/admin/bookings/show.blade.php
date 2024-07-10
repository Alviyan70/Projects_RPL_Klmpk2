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
    <div class="card-form">
        <div class="card"> 
            <div class="card-header">Booking Details</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="id">ID</label>
                    <input type="text" name="id" id="id" class="form-control" value="{{ $booking->id }}" readonly>
                </div>
    
                <div class="form-group">
                    <label for="user_id">User ID</label>
                    <input type="text" name="user_id" id="user_id" class="form-control" value="{{ $booking->user_id }}" readonly>
                </div>
    
                <div class="form-group">
                    <label for="room_id">Room ID</label>
                    <input type="text" name="room_id" id="room_id" class="form-control" value="{{ $booking->room_id }}" readonly>
                </div>
    
                <div class="form-group">
                    <label for="check_in_date">Check In Date</label>
                    <input type="text" name="check_in_date" id="check_in_date" class="form-control" value="{{ $booking->check_in_date }}" readonly>
                </div>
    
                <div class="form-group">
                    <label for="check_out_date">Check Out Date</label>
                    <input type="text" name="check_out_date" id="check_out_date" class="form-control" value="{{ $booking->check_out_date }}" readonly>
                </div>
    
                <div class="form-group">
                    <label for="total_price">Total Price</label>
                    <input type="text" name="total_price" id="total_price" class="form-control" value="{{ $booking->total_price }}" readonly>
                </div>
    
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" name="status" id="status" class="form-control" value="{{ $booking->status }}" readonly>
                </div>
    
                <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this booking?')">Delete</button>
                </form>
                <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>    
@endsection
