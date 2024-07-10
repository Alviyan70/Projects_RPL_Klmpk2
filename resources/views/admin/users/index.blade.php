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
        <h1>List of Users</h1>
        <a class="btn-create" href="{{ route('admin.users.create') }}">Create User</a>
        <table class="rooms-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a class="btn-show" href="{{ route('admin.users.show', $user->id) }}">Show</a>
                            <a class="btn-edit" href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn-delete" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection
