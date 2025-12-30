@extends('MasterView')
 @section('dynamic_content')
 
    <style>
        .booking-card {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            border:none;
        }
        .table-responsive {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4 tex-h2">Booking History</h2>
        <div class="row row-cols-1 row-cols-md-2 g-4"> 
            @if($bookings->isEmpty())
                <p class="text-center text text-danger">No history found.</p>
            @else
                @foreach($bookings as $book)
                    <div class="col">   
                        <div class="booking-card shadow-lg">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5 class="card-title mb-3">Booking Id: {{$book->b_id}}</h5>
                                    <h6 class="card-title"><strong>Booking Status:</strong> {{ $book->b_status }} 
                                    @if($book->b_status == 'Pending')
                                        <small class="text text-danger"><u>Your Room Will Be Confirm Within 1-2 hours.</u></small></h6>
                                    @endif
                                    <p class="card-text mt-3"><strong>Name:</strong> {{ $book->u_name }}</p>
                                    <p class="card-text"><strong>Email:</strong> {{ $book->u_email }}</p>
                                    <p class="card-text"><strong>Phone:</strong> {{ $book->u_phone }}</p>
                                    <p class="card-text"><strong>Check-in Date:</strong> {{ $book->checkin_date }}</p>
                                    <p class="card-text"><strong>Check-out Date:</strong> {{ $book->checkout_date }}</p>
                                    <p class="card-text"><strong>Number of Adults:</strong> {{ $book->adults }}</p>
                                    <p class="card-text"><strong>Number of Children:</strong> {{ $book->children }}</p>
                                    <p class="card-text"><strong>Total Amount:</strong> ₹{{ $book->total_price }}.00</p>
                                    <p class="card-text"><strong>Payment Status:</strong> 
                                    @if($book->b_status == 'Confirmed' || $book->b_status == 'Pending')
                                        {{ $book->p_status }}
                                    @else
                                        Refunded
                                    @endif
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ URL::to('/') }}/images/rooms/{{ $book->b_image }}" alt="Booking Image 1" class="card-img-top rounded shadow-lg" style="height: 200px;">
                                    @if($book->b_status == 'Confirmed')
                                        <button class="btn btn-dark form-control mt-3"><a href="{{ URL::to('/') }}/Feedback/{{ $book->id }}" class="text-decoration-none text-white">Give Feedback</a></button>        
                                    @endif    
                                    @if($book->b_status == 'Pending')
                                        <button class="btn btn-danger form-control mt-3 "><a href="{{ URL::to('/') }}/CancelledBooking/{{ $book->id }}" class="text-decoration-none text-white">Cancelled Booking</a></button>
                                        <p class="text text-danger mt-5">Note : Once Your Booking Is Confirm You Can't Cancelled Your Room !!</p>    
                                    @endif
                                    @if($book->b_status == 'Rejected')
                                        <p class="text text-danger mt-5">"We appreciate your inquiry, but the room is fully booked for the selected dates. Please consider alternative dates ." </p>
                                    @endif    
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Booking ID</th>
                        <th>Booking Status</th>
                        <th scope="col">Guest Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Check-in Date</th>
                        <th scope="col">Check-out Date</th>
                        <th scope="col">Number of Adults</th>
                        <th scope="col">Number of Children</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Total Amount</th>
                    </tr>
                </thead>
                <tbody>
                @if($bookings->isEmpty())
                    <p class="text-center text text-danger">No history found.</p>
                @else
                    @foreach($bookings as $book)
                        <tr>
                            <th scope="row">{{$book->b_id}}</th>
                            <td>{{ $book->b_status }}</td>
                            <td>{{ $book->u_name }}</td>
                            <td>{{ $book->u_email }}</td>
                            <td>{{ $book->u_phone }}</td>
                            <td>{{ $book->checkin_date }}</td>
                            <td>{{ $book->checkout_date }}</td>
                            <td>{{ $book->adults }}</td>
                            <td>{{ $book->children }}</td>
                            <td>@if($book->b_status == 'Confirmed' || $book->b_status == 'Pending')
                                        {{ $book->p_status }}
                                    @else
                                        Refunded
                                    @endif</td>
                            <td>₹{{ $book->total_price }}.00</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        
    </div>
    
 @endsection