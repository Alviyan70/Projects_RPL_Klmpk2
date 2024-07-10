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
                        <h2>Hasil Pencarian</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

<!-- Rooms Section Begin -->
<section class="rooms-section spad">
    <div class="container">
        <div class="row">
            @if(count($result) > 0)
                @foreach($result as $data)
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('img/room/room-' . $data->id . '.jpg') }}" alt="">
                        <div class="ri-text">
                            <h4>{{ $data->room_type }}</h4>
                            <h3>Rp. {{ number_format($data->price, 0, ',', '.') }}<span>/malam</span></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size:</td>
                                        <td>{{ $data->size }}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>Maksimal {{ $data->capacity }} Orang</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed:</td>
                                        <td>{{ $data->bed }} Beds</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>{{ $data->description }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{ route('room_details', ['id' => $data->id]) }}" class="primary-btn">Detail Kamar</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p>data tidak ditemukan!</p>
            @endif
        </div>
    </div>
</section>
<!-- Rooms Section End -->

@endsection
