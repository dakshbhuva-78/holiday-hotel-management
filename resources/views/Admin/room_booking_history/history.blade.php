@extends('Admin/AdminMasterView')
@section('dynamic_content')
<div class="table-responsive mt-3">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Booking ID</th>
                <th scope="col">Room Image</th>
                <th scope="col">Booking Status</th>
                <th scope="col">Guest Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Check-in Date</th>
                <th scope="col">Check-out Date</th>
                <th scope="col">Number Of Adults</th>
                <th scope="col">Number Of Children</th>
                <th scope="col">Total Amount</th>
                <th scope="col">Payment Status</th>
                <th scope="col">Confirmation</th>
                <th scope="col">Rejection</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        @if($bookinghistories->isEmpty())
            <p class="text-center text text-danger">No history found.</p>
        @else
            @foreach($bookinghistories as $hstry)
                <tr>
                    <th scope="row">{{ $hstry->b_id }}</th>
                    <td><img src="{{ URL::to('/') }}/images/rooms/{{ $hstry->b_image }}" alt="Room Image" class="img-fluid"></td>
                    <td>{{ $hstry->b_status }}</td>
                    <td>{{ $hstry->u_name }}</td>
                    <td>{{ $hstry->u_email }}</td>
                    <td>{{ $hstry->u_phone }}</td>
                    <td>{{ $hstry->checkin_date }}</td>
                    <td>{{ $hstry->checkout_date}}</td>
                    <td>{{ $hstry->adults }}</td>
                    <td>{{ $hstry->children }}</td>
                    <td>₹{{$hstry->total_price}}</td>
                    <td>@if($hstry->b_status == 'Confirmed' || $hstry->b_status == 'Pending')
                                        {{ $hstry->p_status }}
                                    @else
                                        Refunded
                                    @endif</td>
                    <td><a href="{{ route('/confirmationbooking',$id = $hstry->id) }}" class="btn btn-dark">Confirm</a></td>
                    <td><a href="{{ route('/rejectionbooking',$id = $hstry->id) }}" class="btn btn-danger">Reject</a></td>
                    <td><a href="{{ route('/deleterecord',$id = $hstry->id) }}" class="btn btn-danger">Delete</a></td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
@endsection