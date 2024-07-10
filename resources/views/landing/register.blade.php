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
    <div class="breadcrumb-text">
        <h2>Register</h2>
    </div>
    <!-- Breadcrumb Section End -->

    <section class="register-section">
        <div class="container">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- <div class="form-group">
                    <label for="name">Nama test</label>
                    <input type="text" id="name" name="name" placeholder="Nama" required>
                </div> -->
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" id="name" name="name" placeholder="Nama" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Password" required>
                </div>
                <div class="button-container">
                    <button type="submit">Register</button>
                </div>
                <p>Sudah punya akun? <a href="{{ route('login') }}">Log In</a></p>
            </form>
        </div>
    </section>       
@endsection
