<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
use Illuminate\Support\Facades\Session;
use App\Models\registration;
use App\Models\bookinghistorie;

class PaymentController extends Controller
{
    public function index()
    {
        $user = session('u_email');
        $users = registration::where('u_email', $user)->first();

        if (!$users) {
            return redirect('/error')->with('message', 'User not found');
        }

        return redirect('/payment_form')->with('users', $users);
    }

    public function success()
    {
        return view('success');
    }

    public function payment(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'amount' => 'required|numeric',
            'email' => 'required|email'
        ]);

        $name = $request->input('username');
        $amount = $request->input('amount');
        $email = $request->input('email');

        $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));
        $order = $api->order->create([
            'receipt' => '123',
            'amount' => $amount * 100,
            'currency' => 'INR'
        ]);

        $orderId = $order['id'];

        $user_pay = new Payment();
        $user_pay->username = $name;
        $user_pay->amount = $amount;
        $user_pay->user_email = $email;
        $user_pay->payment_id = $orderId;
        $user_pay->razorpay_id = "0000";
        $user_pay->save();

        $data = [
            'order_id' => $orderId,
            'amount' => $amount
        ];

        Session::put('order_id', $orderId);
        Session::put('amount', $amount);

        $user = session('u_email');
        $users = registration::where('u_email', $user)->first();

        return redirect('/payment_form')->with([
            'data' => $data,
            'users' => $users
        ]);
    }

    public function pay(Request $request)
    {
        $data = $request->all();

        // Fetch payment record using Razorpay order ID
        $user = Payment::where('payment_id', $data['razorpay_order_id'])->first();

        if (!$user) {
            \Log::error('Payment not found', ['order_id' => $data['razorpay_order_id']]);
            return redirect()->route('error')->with('message', 'Payment record not found');
        }

        $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));

        try {
            // Verify payment signature
            $attributes = [
                'razorpay_signature' => $data['razorpay_signature'],
                'razorpay_payment_id' => $data['razorpay_payment_id'],
                'razorpay_order_id' => $data['razorpay_order_id']
            ];
            $api->utility->verifyPaymentSignature($attributes);

            // Update payment record
            $user->payment_done = true;
            $user->razorpay_id = $data['razorpay_payment_id'];
            if (!$user->save()) {
                \Log::error('Failed to update payment record', ['user' => $user]);
                return redirect()->route('error')->with('message', 'Failed to update payment record');
            }

            // Retrieve user bookings
            $email = session('u_email');
            $bookings = bookinghistorie::where('u_email', $email)->get();

            return view('Mybookings', compact('bookings'));
        } catch (SignatureVerificationError $e) {
            \Log::error('Payment verification failed', ['error' => $e->getMessage()]);
            return redirect()->route('error')->with('message', 'Payment verification failed');
        }
    }
    
    public function error()
    {
        return view('error');
    }
}
