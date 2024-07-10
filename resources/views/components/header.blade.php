{{-- <!-- Header Section Begin -->
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
                                <li><a href="{{ route('') }}">Settings</a></li>
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
<!-- Header End --> --}}