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
                    <div class="card-header">Edit Booking</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.bookings.update', $booking->id) }}">
                            @csrf
                            @method('PUT')
    
                            <div class="form-group">
                                <label for="user_id">User ID:</label>
                                <input id="user_id" type="number" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ old('user_id', $booking->user_id) }}" required>
                                @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <label for="room_id">Room ID:</label>
                                <input id="room_id" type="number" class="form-control @error('room_id') is-invalid @enderror" name="room_id" value="{{ old('room_id', $booking->room_id) }}" required>
                                @error('room_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <label for="check_in_date">Check In Date:</label>
                                <input id="check_in_date" type="date" class="form-control @error('check_in_date') is-invalid @enderror" name="check_in_date" value="{{ old('check_in_date', $booking->check_in_date) }}" required>
                                @error('check_in_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <label for="check_out_date">Check Out Date:</label>
                                <input id="check_out_date" type="date" class="form-control @error('check_out_date') is-invalid @enderror" name="check_out_date" value="{{ old('check_out_date', $booking->check_out_date) }}" required>
                                @error('check_out_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <label for="total_price">Total Price:</label>
                                <input id="total_price" type="number" class="form-control @error('total_price') is-invalid @enderror" name="total_price" value="{{ old('total_price', $booking->total_price) }}" required>
                                @error('total_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select id="status" class="form-control @error('status') is-invalid @enderror" name="status" required>
                                    <option value="pending" {{ old('status', $booking->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ old('status', $booking->status) == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="canceled" {{ old('status', $booking->status) == 'canceled' ? 'selected' : '' }}>Canceled</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <button type="submit" class="btn btn-primary">Update Booking</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
@endsection
