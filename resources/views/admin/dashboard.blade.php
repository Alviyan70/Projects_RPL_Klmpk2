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
                                <img src="img/nevatel.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li class="active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li><a href="{{ route('rooms.index') }}">Rooms</a></li>
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

<!-- Admin Dashboard Content Begin -->
<section class="admin-dashboard-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Welcome to Admin Dashboard</h2>
                <p>This is the admin dashboard where you can manage the entire website.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="admin-card">
                    <div class="card-header-admin">
                        <h3>Rooms</h3>
                    </div>
                    <div class="card-body">
                        <p>Manage all rooms</p>
                        <a href="{{ route('rooms.index') }}" class="btn btn-primary">View Rooms</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="admin-card">
                    <div class="card-header-admin">
                        <h3>Bookings</h3>
                    </div>
                    <div class="card-body">
                        <p>Manage all bookings</p>
                        <a href="{{ route('bookings.index') }}" class="btn btn-primary">View Bookings</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="admin-card">
                    <div class="card-header-admin">
                        <h3>Users</h3>
                    </div>
                    <div class="card-body">
                        <p>Manage all users</p>
                        <a href="{{ route('users.index') }}" class="btn btn-primary">View Users</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="admin-card">
                    <div class="card-header-admin">
                        <h3>Users Message</h3>
                    </div>
                    <div class="card-body">
                        <p>Manage Users Message</p>
                        <a href="{{ route('message.index') }}" class="btn btn-primary">Users Message</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Admin Dashboard Content End -->
@endsection
