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
                            <a href="{{ route('rooms') }}" class="bk-btn">Booking Now</a>
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
                        <h2>Our Rooms</h2>
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

<!-- Room Details Section Begin -->
<section class="room-details-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="room-details-item">
                    <img src="{{ asset('img/room/room-' . $room->id . '.jpg') }}" alt="">
                    <div class="rd-text">
                        <div class="rd-title">
                            <h3>{{ $room->room_type }}</h3>
                            <div class="rdt-right">
                                <div class="rating">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < floor($room->average_rating))
                                            <i class="icon_star"></i>
                                        @elseif ($i < $room->average_rating)
                                            <i class="icon_star-half_alt"></i>
                                        @else
                                            <i class="icon_star_alt"></i>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <h2>Rp. {{ number_format($room->price, 0, ',', '.') }}<span>/malam</span></h2>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="r-o">Size:</td>
                                    <td>{{ $room->size }}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Capacity:</td>
                                    <td>Maksimal {{ $room->capacity }} Orang</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Bed:</td>
                                    <td>{{ $room->bed }} Beds</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Services:</td>
                                    <td>{{ $room->description }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="rd-reviews">
                    <h4>Reviews</h4>
                    @foreach($room->reviews as $review)
                        <div class="review-item">
                            <div class="ri-pic">
                                <img src="{{ asset('img/room/avatar/avatar-'. $room->id . '.jpg') }}" alt="">
                            </div>
                            <div class="ri-text">
                                <span>{{ $review->created_at->format('d M Y') }}</span>
                                <div class="rating">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < $review->rating)
                                            <i class="icon_star"></i>
                                        @else
                                            <i class="icon_star_alt"></i>
                                        @endif
                                    @endfor
                                </div>
                                <h5>{{ $review->name }}</h5>
                                <p>{{ $review->review }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="review-add">
                    <h4>Add Review</h4>
                    <form action="{{ route('reviews.store') }}" method="POST" class="ra-form">
                        @csrf
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" name="name" placeholder="Name*" required>
                            </div>
                            <div class="col-lg-6">
                                <input type="email" name="email" placeholder="Email*" required>
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <h5>Your Rating:</h5>
                                    <select name="rating" required>
                                        <option value="1">1 Star</option>
                                        <option value="2">2 Stars</option>
                                        <option value="3">3 Stars</option>
                                        <option value="4">4 Stars</option>
                                        <option value="5">5 Stars</option>
                                    </select>
                                </div>
                                <textarea name="review" placeholder="Your Review" required></textarea>
                                <button type="submit">Submit Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="room-booking">
                    <h3>Your Reservation</h3>
                    <form action="{{ route('booking.now') }}" method="POST">
                        @csrf
                        <input type="hidden" id="room_id" name="room_id" value="{{ $room->id }}">
                        <input type="hidden" id="total_price" name="total_price" value="{{ $room->price }}">
                        <div class="check-date">
                            <label for="check-in-date">Check In:</label>
                            <input type="text" class="date-input" id="check-in-date" name="check_in_date">
                            <i class="icon_calendar"></i>
                        </div>
                        <div class="check-date">
                            <label for="check-out-date">Check Out:</label>
                            <input type="text" class="date-input" id="check-out-date" name="check_out_date">
                            <i class="icon_calendar"></i>
                        </div>
                        <div class="select-option">
                            <label for="guest">Guests:</label>
                            <select id="guest" name="guest">
                                <option value="1">1 Adults</option>
                                <option value="2">2 Adults</option>
                                <option value="3">3 Adults</option>
                            </select>
                        </div>
                        <div class="select-option">
                            <label for="room">Room:</label>
                            <select id="room" name="total_room">
                                <option value="1">1 Room</option>
                                <option value="2">2 Room</option>
                            </select>
                        </div>
                        <button type="submit">Booking Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Room Details Section End -->


@endsection

