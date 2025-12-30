@extends('MasterView')

@section('dynamic_content')
    <div class="offset-lg-3 offset-md-3 col-6">
        <h1>Razorpay Payment Gateway</h1>
        <br>
        <!-- Payment Form -->
        <form action="/payment" method="POST">
            @csrf
            <!-- Username Input -->
            <div class="row mb-3">
                <div class="col">
                    <label for="uname1" class="form-label">Username</label>
                    <input 
                        type="text" 
                        name="username" 
                        id="uname1" 
                        value="{{ $users->u_name ?? '' }}" 
                        class="form-control" 
                        required
                    >
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Email Input -->
            <div class="row mb-3">
                <div class="col">
                    <label for="email1" class="form-label">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email1" 
                        value="{{ $users->u_email ?? '' }}" 
                        class="form-control" 
                        readonly
                    >
                </div>
            </div>

            <!-- Amount Input -->
            <div class="row mb-3">
                <div class="col">
                    <label for="amount" class="form-label">Amount</label>
                    <input 
                        type="text" 
                        name="amount" 
                        id="amount" 
                        value="{{ $totalPrice ?? 0 }}" 
                        class="form-control" 
                        readonly
                    >
                </div>
            </div>

            <!-- Submit Button -->
            <div class="row text-center">
                <div class="col">
                    <button 
                        type="submit" 
                        id="rzp-button1" 
                        class="btn btn-dark form-control"
                    >
                        Pay Now
                    </button>
                </div>
            </div>
        </form>

        <!-- Razorpay Integration -->
        @if (Session::has('amount'))
            <div class="container text-center mx-auto mt-5">
                <form action="/pay" method="POST">
                    @csrf
                    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                    <script>
                        var options = {
                            "key": "rzp_test_FNY2BJxFQpkE2l", // Enter the Key ID from Dashboard
                            "amount": "{{ Session::get('amount') }}", // Amount in currency subunits (e.g., paise for INR)
                            "currency": "INR",
                            "name": "HOLIDAY", // Your business name
                            "description": "Test Transaction",
                            "image": "https://example.com/your_logo",
                            "order_id": "{{ Session::get('order_id') }}", // Order ID from server response
                            "handler": function (response) {
                                alert("Payment ID: " + response.razorpay_payment_id);
                                alert("Order ID: " + response.razorpay_order_id);
                                alert("Signature: " + response.razorpay_signature);
                            },
                            "prefill": {
                                "name": "{{ $users->u_name ?? '' }}",
                                "email": "{{ $users->u_email ?? '' }}",
                                "contact": "{{ $users->u_phone ?? '' }}"
                            },
                            "notes": {
                                "address": "Mobor Beach, Cavelossim, Goa, 403731"
                            },
                            "theme": {
                                "color": "#3399cc"
                            }
                        };

                        var rzp1 = new Razorpay(options);
                        rzp1.on('payment.failed', function (response) {
                            console.error("Payment Failed:", response.error);
                            alert("Error Code: " + response.error.code);
                            alert("Description: " + response.error.description);
                            alert("Source: " + response.error.source);
                            alert("Step: " + response.error.step);
                            alert("Reason: " + response.error.reason);
                        });

                        document.getElementById('rzp-button1').onclick = function (e) {
                            rzp1.open();
                            e.preventDefault();
                        };
                    </script>
                    <input type="hidden" name="hidden" value="Hidden Element">
                </form>
            </div>
        @endif
    </div>
@endsection
