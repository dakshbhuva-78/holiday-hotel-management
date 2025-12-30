@extends('MasterView')

@section('dynamic_content')

<div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">ABOUT US</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
        Unlock the door to unforgettable experiences with just a click. Book your next adventure with ease
        <br>
         and let every stay be a chapter in your travel story
        </p>
    </div>
    @if ($about->isEmpty())
        <p class="text-danger text-center">No About Us Content Added !!</p>
    @else
        @foreach($about as $data)
            <div class="conatiner m-5">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
                        <h3 class="mb-3">{{ $data->own_name }}</h3>
                        <p class="lead">
                            {{ $data->own_about }}                        
                        </p> 
                    </div>
                    <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
                        <img src="{{ URL::to('/') }}/images/about/{{ $data->own_image }}" class="w-100">
                    </div>
                </div>
            </div>
        @endforeach
    @endif
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4 px-4">
                    <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                        <img src="images/about/hotel.svg" width="70px">
                        <h4 class="mt-4">100+ Rooms</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 px-4">
                    <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                        <img src="images/about/customers.svg" width="70px">
                        <h4 class="mt-4">200+Customers</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 px-4">
                    <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                        <img src="images/about/rating.svg" width="70px">
                        <h4 class="mt-4">150+ Reviews</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 px-4">
                    <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                        <img src="images/about/hotel.svg" width="70px">
                        <h4 class="mt-4">200+ Staffs</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection