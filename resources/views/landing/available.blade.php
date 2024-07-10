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
                            <a href="https://www.instagram.com/teknik.unimma?igsh=djZtaHJoenVpbzRw"><i class="fa fa-instagram"></i></a>
                            <a href="https://wa.me/6285702062875"><i class="fa fa-whatsapp"></i></a>
                        </div>
                        <a href="{{ route('rooms') }}" class="bk-btn">Cek Rooms</a>
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
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('img/nevatel.png') }}" alt="Nevatel">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="nav-menu">
                        <nav class="mainmenu">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li class="active"><a href="{{ route('rooms') }}">Rooms</a></li>
                                <li><a href="{{ route('about_us') }}">About Us</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
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
<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Rooms Available</h2>
                    <div class="bt-option">
                        <a href="{{ route('home') }}">Home</a>
                        <span>Rooms</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->
<!-- Rooms Section Begin -->
<div class="container room-available">
    @if($availableRooms->isEmpty())
        <p>Tidak ada kamar yang tersedia untuk tanggal yang dipilih.</p>
    @else
        <div class="room-list">
            @foreach($availableRooms as $room)
                <div class="room-item">
                    <div clas="room-item img">
                        <img src="{{ asset('img/room/room-details.jpg') }}" alt="Room Image">
                    </div>
                    <div class="room-info">
                        <h3>{{ $room->room_type }}</h3>
                        <p>Rp. {{ number_format($room->price, 0, ',', '.') }}/malam</p>
                        <p>Ukuran: {{ $room->size }}</p>
                        <p>Kapasitas: {{ $room->capacity }}</p>
                        <p>Bed: {{ $room->bed }}</p>
                        <p>Fasilitas: {{ $room->description }}</p>
                        <a href="{{ route('room_details', $room->id) }}" class="btn btn-primary">Cek Detail</a>
                        <a href="/reservation" class="btn btn-secondary">Booking Now</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
<!-- Rooms Section End -->
@endsection
