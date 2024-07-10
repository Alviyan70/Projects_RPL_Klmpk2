@extends('components.master')

@section('content')
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
                                <li><a href="{{ route('bookings.index') }}">Bookings</a></li>
                                <li class="active"><a href="{{ route('users.index') }}">Users</a></li>
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
        <div class="card-header">User Details</div>
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" readonly>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" readonly>
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <input type="text" name="role" id="role" class="form-control" value="{{ $user->role }}" readonly>
            </div>

            <div class="form-group">
                <label for="email_verified_at">Email Verified At</label>
                <input type="text" name="email_verified_at" id="email_verified_at" class="form-control" value="{{ $user->email_verified_at }}" readonly>
            </div>

            <div class="form-group">
                <label for="created_at">Created At</label>
                <input type="text" name="created_at" id="created_at" class="form-control" value="{{ $user->created_at }}" readonly>
            </div>

            <div class="form-group">
                <label for="updated_at">Updated At</label>
                <input type="text" name="updated_at" id="updated_at" class="form-control" value="{{ $user->updated_at }}" readonly>
            </div>

            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this room?')">Delete</button>
            </form>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back to Users List</a>
        </div>
    </div>
</div>
@endsection
