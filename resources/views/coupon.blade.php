@extends('MasterView')
@section('dynamic_content')
    <div class="row">
        <div class="col-md-9 my-3 mt-5">
            <div class="card border-0 shadow-lg rounded-4" style="max-width: 450px; margin-left: auto; margin-right: 10%;">
                <div class="mx-auto text h2 mt-4">REWARDS</div>
                <div class="card-body">
                    <h5>Congrats! You won a Discount Coupon,</h5>
                    @foreach($activeOffers as $code)
                        <h6>Your Discount Coupon Code : {{ $code->coupon_code }}</h6>
                    @endforeach
                    <form action="{{ url('coupon') }}" method="POST">
                        @csrf
                        <input type="hidden" name="total" value="{{ $totalPrice }}">
                        <input type="text" name="coupon" class="form-control" placeholder="Enter coupon code here">
                        <button type="submit" class="btn btn-dark mt-3 mb-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
