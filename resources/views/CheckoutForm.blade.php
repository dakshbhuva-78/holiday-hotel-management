@extends('MasterView')

@section('dynamic_content')

    <div class="row">
        <div class="col-lg-8 my-3 mt-5">
            <div class="card border-0 shadow-lg rounded-4" style="max-width: 450px; margin-left: auto; margin-right: 10%;">
                <div class="mx-auto text h2 mt-4">Booking Confirmation Form</div>
                <div class="card-body">
                    <form action="" class="" method="post">
                        @CSRF
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" placeholder="Enter your Name" name="name" value="{{ $users->u_name }}">
                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div><br>
                        
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" placeholder="Enter your Email" name="email" value="{{ $users->u_email }}" readonly>
                            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                        </div><br>
                        
                        <div class="form-group">
                            <input type="number" class="form-control" id="number" placeholder="Enter your Mobile Number" name="number" value="{{ $users->u_phone }}">
                            @error('number')<span class="text-danger">{{ $message }}</span>@enderror
                        </div><br>
                        
                        <div class="form-group">
                            <label for="checkin" class="form-label">Check-in Date</label>
                            <input type="date" class="form-control" id="checkin" name="checkin" value="{{old('checkin')}}">
                            @error('checkin')<span class="text-danger">{{ $message }}</span>@enderror
                        </div><br>

                        <div class="form-group">
                            <label for="checkout" class="form-label">Check-out Date</label>
                            <input type="date" class="form-control" id="checkout" name="checkout" value="{{old('checkout')}}">
                            @error('checkout')<span class="text-danger">{{ $message }}</span>@enderror
                        </div><br>

                        <div class="form-group">
                            <select class="form-control" id="adults" name="adults">
                                <option value="">Select How Many Adults</option>
                                <option value="One" {{ old('adults') == 'One' ? 'selected' : '' }}>One</option>
                                <option value="Two" {{ old('adults') == 'Two' ? 'selected' : '' }}>Two</option>
                                <option value="Three" {{ old('adults') == 'Three' ? 'selected' : '' }}>Three</option>
                            </select>
                            @error('adults')<span class="text-danger">{{ $message }}</span>@enderror
                        </div><br>

                        <div class="form-group">
                            <select class="form-control" id="child" name="child">
                                <option value="">Select How Many Children</option>
                                <option value="No" {{ old('child') == 'No' ? 'selected' : '' }}>No</option>
                                <option value="One" {{ old('child') == 'One' ? 'selected' : '' }}>One</option>
                                <option value="Two" {{ old('child') == 'Two' ? 'selected' : '' }}>Two</option>
                                <option value="Three" {{ old('child') == 'Three' ? 'selected' : '' }}>Three</option>
                            </select>
                            @error('child')<span class="text-danger">{{ $message }}</span>@enderror
                        </div><br>
                        <!-- <div class="form-group">
                            <input type="text" class="form-control" id="coupon" name="coupon" placeholder="If You Have Coupon Code Then Enter">
                            @error('coupon')<span class="text-danger">{{ $message }}</span>@enderror
                        </div><br> -->
                        <button type="submit" class="btn btn-dark form-control btn-block">Confirm Booking</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mt-5">
            <h2 class="card-title">Your Selected Room</h2>
            <div class="card border-0 shadow" style="max-width: 400px;">
                <img src="{{ URL::to('/') }}/images/rooms/{{ $room->r_image}}" class="card-img-top" alt="Room Image">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">₹{{$room->r_price}} per night</h6>
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
                </div>
            </div>
        </div>
    </div>

@endsection
