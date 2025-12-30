@extends('MasterView')

@section('dynamic_content')

<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR ROOMS</h2>
        @if ($rooms->isEmpty())
            <p class="text-danger text">No Rooms Added !!</p>
        @else
        <div class="row" id="rooms">
            @foreach($rooms as $room)
                <div class="col-lg-4 my-3">
                    <div class="card border-0 shadow h-100" style="max-width: 350px; margin:auto;">
                        <img src="{{ URL::to('/') }}/images/rooms/{{ $room->r_image }}" class="card-img-top" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h6 class="mb-4">₹{{ $room->r_price }} per night</h6>
                            <p class="card-text">{{ $room->r_description }}</p>
                            <div class="features mb-4">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    {{ $room->r_features }}
                                </span> 
                            </div>
                            <div class="facilities mb-4">
                                <h6 class="mb-1">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    {{ $room->r_facilities }}
                                </span>
                            </div>
                            <div class="guests mb-4">
                                <h6 class="mb-1">Guests</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    {{ $room->r_guests }}
                                </span>
                            </div>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-evenly mb-2">
                                    <a href="{{ URL::to('/') }}/CheckoutForm/{{ $room->id }}" class="btn btn-sm btn-outline-dark shadow-none">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endif
@endsection