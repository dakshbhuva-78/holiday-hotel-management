@extends('MasterView')
@section('dynamic_content')
<div class="container-fluid px-lg-4 mt-4">

    <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            @foreach($images as $index => $image)
            <button type="button" data-bs-target="#demo" data-bs-slide-to="{{ $index }}"
                class="{{ $index == 0 ? 'active' : '' }}"></button>
            @endforeach
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            @foreach($images as $index => $image)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <img src="{{ asset('images/carousel/'.$image->c_image) }}" class="d-block w-100">
            </div>
            @endforeach
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>


    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR ROOMS</h2>
    <div class="row">
        <div class="col-lg-4  my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">
                <img src="{{ URL::to('/') }}/images/rooms/IMG_17055.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5></h5>
                    <h6 class="mb-4">₹2399 per night</h6>
                    <div class="features mb-4">
                        <h6 class="mb-1">Features</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Parking Availability
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Dining Options
                        </span>
                    </div>
                    <div class="facilities mb-4">
                        <h6 class="mb-1">Facilities</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Free Wi-Fi
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            T.V.
                        </span>
                    </div>
                    <div class="guests mb-4">
                        <h6 class="mb-1">Guests</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap ">
                            Adults
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Children
                        </span>
                    </div>
                    <div class="d-flex justify-content-evenly mb-2">
                        <a href="{{ URL::to('/') }}/rooms" class="btn btn-sm btn-outline-dark shadow-none">More
                            details</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4  my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">
                <img src="{{ URL::to('/') }}/images/rooms/IMG_11892.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5></h5>
                    <h6 class="mb-4">₹5499 per night</h6>
                    <div class="features mb-4">
                        <h6 class="mb-1">Features</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Parking Availability
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Dining Options
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Free SPA
                        </span>
                    </div>
                    <div class="facilities mb-4">
                        <h6 class="mb-1">Facilities</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Free Wi-Fi
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            A.C.
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            T.V.
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Geyser
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Room Heater
                        </span>
                    </div>
                    <div class="guests mb-4">
                        <h6 class="mb-1">Guests</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap ">
                            Adults
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Children
                        </span>
                    </div>
                    <div class="d-flex justify-content-evenly mb-2">
                        <a href="{{ URL::to('/') }}/rooms" class="btn btn-sm btn-outline-dark shadow-none">More
                            details</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">
                <img src="{{ URL::to('/') }}/images/rooms/IMG_65019.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5></h5>
                    <h6 class="mb-4">₹3199 per night</h6>
                    <div class="features mb-4">
                        <h6 class="mb-1">Features</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Parking Availability
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Dining Options
                        </span>
                    </div>
                    <div class="facilities mb-4">
                        <h6 class="mb-1">Facilities</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Free Wi-Fi
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            A.C.
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            T.V.
                        </span>

                    </div>
                    <div class="guests mb-4">
                        <h6 class="mb-1">Guests</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap ">
                            Adults
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Children
                        </span>
                    </div>
                    <div class="d-flex justify-content-evenly mb-2">
                        <a href="{{ URL::to('/') }}/rooms" class="btn btn-sm btn-outline-dark shadow-none">More
                            details</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 text-center mt-5">
            <a href="{{ URL::to('/') }}/rooms" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More
                Rooms >>></a>
        </div>
    </div><br>
    <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="mb-4">Check Booking Availability</h5>
                <form action="">
                    <div class="row align-items-end">
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-in</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-out</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Adult</label>
                            <select class="form-select shadow-none">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label class="form-label" style="font-weight: 500;">Children</label>
                            <select class="form-select shadow-none">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-lg-1 mb-lg-3 mt-2">
                            <button type="submit" class="btn btn text-white shadow-none custom-bg">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR FACILITIES</h2>
    <div class="conatiner">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="{{ URL::to('/') }}/images/facilities/tv.svg" width="60px">
                <h5 class="mt-3">TV</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="{{ URL::to('/') }}/images/facilities/wifi.svg" width="60px">
                <h5 class="mt-3">Free WI-FI</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="{{ URL::to('/') }}/images/facilities/spa.svg" width="60px">
                <h5 class="mt-3">SPA</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="{{ URL::to('/') }}/images/facilities/ac.svg" width="60px">
                <h5 class="mt-3">AC</h5>
            </div>
        </div>
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <div class="col-lg-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="{{ URL::to('/') }}/images/facilities/geyser.svg" width="60px">
                <h5 class="mt-3">Geyser</h5>
            </div>
            <div class="col-lg-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="{{ URL::to('/') }}/images/facilities/roomheater.svg" width="60px">
                <h5 class="mt-3">Room Heater</h5>
            </div>

        </div>
    </div>
</div>

@endsection