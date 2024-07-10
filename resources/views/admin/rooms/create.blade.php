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
        <div class="card-header">Create New Room</div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.rooms.store') }}">
                @csrf
                <div class="form-group">
                    <label for="room_number">Room Number</label>
                    <input id="room_number" type="text" class="form-control @error('room_number') is-invalid @enderror" name="room_number" value="{{ old('room_number') }}" required autofocus>
                    @error('room_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="room_type">Room Type</label>
                    <input id="room_type" type="text" class="form-control @error('room_type') is-invalid @enderror" name="room_type" value="{{ old('room_type') }}" required>
                    @error('room_type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="size">Ukuran</label>
                    <input id="size" type="text" class="form-control @error('size') is-invalid @enderror" name="size" value="{{ old('size') }}" required autofocus>
                    @error('size')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bed">Bed</label>
                    <input id="bed" type="text" class="form-control @error('bed') is-invalid @enderror" name="bed" value="{{ old('bed') }}" required autofocus>
                    @error('bed')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required>{{ old('description') }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required>
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="capacity">Capacity</label>
                    <input id="capacity" type="number" class="form-control @error('capacity') is-invalid @enderror" name="capacity" value="{{ old('capacity') }}" required>
                    @error('capacity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" class="form-control @error('status') is-invalid @enderror" name="status" required>
                        <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="booked" {{ old('status') == 'booked' ? 'selected' : '' }}>Booked</option>
                        <option value="maintenance" {{ old('status') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                    </select>
                    @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Create Room</button>
            </form>
        </div>
    </div>
</div>
@endsection
