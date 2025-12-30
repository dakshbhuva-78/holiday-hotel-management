@extends('MasterView')

@section('dynamic_content')
<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Your Search Results</h2>
        @if($rooms->isEmpty())
            <p class="text-danger text-center" >No Rooms found matching your search.</p>
        @else
        <div class="row">
                @foreach($rooms as $room)
                    <div class="col-lg-4  my-3">
                        <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">
                            <img src="{{ URL::to('/') }}/images/rooms/{{ $room->r_image}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5></h5>
                                <h6 class="mb-4">₹{{ $room->r_price }} per night</h6>
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
                                    <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                        {{ $room->r_guests }}
                                    </span>
                                </div>
                                <div class="d-flex justify-content-evenly mb-2">
                                    <!-- <a href="" class="btn btn-sm btn-outline-dark shadow-none">More Details</a> -->
                                    <a href="{{ URL::to('/') }}/CheckoutForm" class="btn btn-sm btn-outline-dark shadow-none">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><br>
        @endif
@endsection