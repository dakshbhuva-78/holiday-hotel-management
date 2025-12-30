<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\registration;
use App\Models\passwordtoken;
use Illuminate\Support\Facades\Mail;
use App\Models\room;
use App\Models\carousel;
use App\Models\about;
use App\Models\bookinghistorie;
use App\Models\Offer;
use App\Models\contact_msg;
use App\Models\feedback;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Exception;

class PageView extends Controller
{
    public function delete_token()
    {
        session()->remove('error');
        date_default_timezone_set("Asia/Kolkata");
        $current_time = Carbon::now();
        PasswordToken::where('expiry_time', '<', $current_time)->delete();
    }
    public function check_token_expiry()
    {
        $result = PasswordToken::where('email', session()->get('forgot_em'))->first();
        if (empty($result)) {
            session()->flash('error' ,'OTP Is Exppired');
            return redirect('ForgetPassword');
        }
    }
    public function Home()
    {
        $images = Carousel::where('active', 1)->get();
        return view('welcome',compact('images'));
    }
    public function login()
    {
        return view('login');
    }
    public function logindata(Request $value)
    {
        $reg = new Registration();

        $validate = Validator::make($value->all(),[
            'email' =>'required|email',
            'pswd' =>'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
        ],[
            'email.required' => 'Email is required.',
            'email.email' => 'Email is not valid.',
            'pswd.required' => 'Password is required.',
            'pswd.min' => 'Password should be at least 8 characters long.',
            'pswd.regex' => 'Password should be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one digit, and one special character.',
        ]);
        $em = $value->email;
        $pwd = $value->pswd;
        $result = Registration::where('u_email', $em)->first();
        $images = Carousel::where('active', 1)->get();
            if (!empty($result)) {
                if ($result->u_status == 'Active') {
                    if (Hash::check($pwd,$result->u_password))
                    {
                        if ($result->u_email == "bhuvadaksh78@gmail.com")
                        {
                            session()->flash('success', "Login successful");
                            session()->put('a_email', $result->u_email);
                            session()->put('a_name', $result->u_name);

                            return view('Admin/AdminDashboard');
                        }
                        else
                        {
                            session()->flash('success', "Login successful");
                            session()->put('u_email', $result->u_email);
                            session()->put('u_name', $result->u_name);
                            return view('welcome',compact('value','images'));
                        }
                    }
                    else {
                        session()->flash('error', 'Incorrect password');
                        return view('login');
                    }
                } else {
                    session()->flash('error', 'Your Account is not activated. Kindly Activate yor account by verifying your email address using the verification link sent to your email account');
                    return view('login');
                }
            } else {
                session()->flash('error', "Incorrect email address");
                return view('login');
            }
        
        return view('welcome',compact('value','images'));
    }
    public function logout()
    {
        session()->flush();
        session()->flash('success', 'You have been logged out successfully');
        $images = Carousel::where('active', 1)->get();
        return view('welcome',compact('images'));
    }
    public function register()
    {
        return view('register');
    }
    public function registrationdata(Request $value)
    {
        $reg = new registration();

        $validate = Validator::make($value->all(),[
            'name' =>'required|min:2|max:20|regex:/^[A-Za-z\s]+$/',
            'u_email' =>'required|email|unique:registrations',
            'phone' =>'required|numeric|max_digits:10|min_digits:10',
            'pswd' =>'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
            'cpswd' =>'required|same:pswd',
            'file1' =>'required|mimes:jpeg,jpg,png',
        ],[
            'name.required' => 'Name is required.',
            'name.min' => 'Name should be at least 2 characters long.',
            'name.max' => 'Name should not be more than 20 characters long.',
            'name.regex' => 'Name should only contain alphabetic characters and spaces.',
            'u_email.required' => 'Email is required.',
            'u_email.email' => 'Email is not valid.', 
            'u_email.unique' => 'Email already exists.',
            'phone.required' => 'Phone number is required.',
            'phone.numeric' => 'Phone number should only contain digits.',
            'phone.max_digits' => 'Phone number should not exceed 10 digits.',
            'phone.min_digits' => 'Phone number should not be less than 10 digits.',
            'pswd.required' => 'Password is required.',
            'pswd.min' => 'Password should be at least 8 characters long.',
            'pswd.regex' => 'Password should be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one digit, and one special character.',
            'cpswd.required' => 'Confirm Password is required.',
            'cpswd.same' => 'Confirm Password should match with Password.',
            'file1.required' => 'Profile Picture is required.',
            'file1.mimes' => 'Profile Picture should be in JPEG, JPG or PNG format.',
        ]);

        if($validate->fails())
        {
            return redirect('register')->withInput()->withErrors($validate);
        }

        $file_name = $value->file('file1');
        $org_file_name = $file_name->getClientOriginalName();
        $file_name->move('images/profile/', $org_file_name);

        $reg->u_name = $value->name;
        $reg->u_email = $value->u_email;
        $reg->u_phone = $value->phone;
        $pswdhash = Hash::make($value->pswd);
        $reg->u_password = $pswdhash;
        $reg->u_image = $org_file_name ;
        $token = uniqid(); 
        $reg->u_token = $token;
        if($reg->save())
        {
            $data = array(
                'username' => $value->name,
                'email' => $value->u_email,
                'token' => $token,
            );
            Mail::Send('register_mail_data', ['data1' => $data], function($message) use ($data){
                $message->to($data['email']);
                $message->from('bhuvadaksh78@gmail.com');
                $message->subject('For Verification Your Account');
            });
            session()->flash('success', 'Registration Successfully and verification link will be send in registered email id');
            return redirect('login');
        }
        else{
            session()->flash('error', 'Error in registration');
            return redirect('register');
        }

        return view('login',compact('value','org_file_name'));
    }
    public function verify_email($email, $token)
    {
        $result = registration::where('u_email',$email)->where('u_token', $token)->first();
        if (empty($result)) {
            session()->flash('error', 'Your account is not registered. Kindly register here.');
            return redirect('register');
        } else {
            if ($result->u_status == 'Active') {
                session()->flash('success', 'Your account is already activated kindly login');
            } else {
                $update = registration::where('u_email', $email)->update(array('u_status' => 'Active'));
                if ($update) {
                    session()->flash('success', 'Your account is activated successfully.');
                } else {
                    session()->flash('error', 'Account activation failed please try after sometime.');
                }
            }
            return redirect('login');
        }
    }
    public function MasterView()
    {
        return view('MasterView');
    }
    public function rooms()
    {
        $rooms = room::all();
        return view('rooms',compact('rooms'));
    }
    public function ContactUs()
    {
        $profile = session('u_email');
        $userprofile = registration::where('u_email', $profile)->first();
        return view('ContactUs',compact('userprofile'));
    }
    public function ContactUsAction(Request $request)
    {
        $contact_msg = new contact_msg();

        $validate = Validator::make($request->all(),[
            'name' =>'required|min:2|max:20|regex:/^[A-Za-z\s]+$/',
            'email' =>'required|email',
            'subject' =>'required',
            'message' =>'required',
        ],[
            'name.required' => 'Name is required.',
            'name.min' => 'Name should be at least 2 characters long.',
            'name.max' => 'Name should not be more than 20 characters long.',
            'name.regex' => 'Name should only contain alphabetic characters and spaces.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email is not valid.',
            'subject' => 'Subject is required.',
            'message' =>'Message is required.',
        ]);

        if($validate->fails())
        {
            return redirect('ContactUs')->withInput()->withErrors($validate);
        }

        $contact_msg->name = $request->name;
        $contact_msg->email = $request->email;
        $contact_msg->subject = $request->subject;
        $contact_msg->message = $request->message;
        
        $contact_msg->save();

        if (session()->has('u_email')) {
            $profile = session('u_email');
            $userprofile = registration::where('u_email', $profile)->first();
        
            if ($userprofile) {
                return view('ContactUs', compact('userprofile'));
            } else {
                return view('ContactUs')->with('error', 'User profile not found.');
            }
        } else {
            return view('ContactUs')->with('error', 'Session not set.');
        }
    }
    public function About()
    {
        $about = about::all();
        return view('About',compact('about'));
    }
    public function Profile()
    {
        $profile = session('u_email');
        $userprofile = registration::where('u_email', $profile)->first();
        return view('Profile',compact('userprofile'));
    }
    public function Mybookings()
    {
        $email = session('u_email');
        $bookings = bookinghistorie::where('u_email', $email)->get();
        return view('Mybookings',compact('bookings'));
    }
    public function CancelledBooking($id)
    {
        bookinghistorie::where('id', $id)->update(['b_status' => 'Cancelled']);
        return redirect('Mybookings');
    }
    public function Feedback()
    {
        $user = session('u_email');
        $user = registration::where('u_email', $user)->first();
        return view('Feedback',compact('user'));
    }
    public function FeedbackAction(Request $request,$id)
    {
        $feedback = new feedback();

        $validate = Validator::make($request->all(),[
            'name' =>'required|min:2|max:20|regex:/^[A-Za-z\s]+$/',
            'email' =>'required|email',
            'rating' =>'required',
            'comments' =>'required',
        ],[
            'name.required' => 'Name is required.',
            'name.min' => 'Name should be at least 2 characters long.',
            'name.max' => 'Name should not be more than 20 characters long.',
            'name.regex' => 'Name should only contain alphabetic characters and spaces.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email is not valid.',
            'rating.required' => 'Rating is required.',
            'comments.required' => 'Comments are required.',
        ]);

        if($validate->fails())
        {
            return redirect('Feedback')->withInput()->withErrors($validate);
        }
        $feedback->r_id = $id ;
        $feedback->u_id = $request->email;
        $feedback->rating = $request->rating;
        $feedback->comments = $request->comments;
        $feedback->save();

        $email = $request->email ;
        $bookings = bookinghistorie::where('u_email', $email)->get();
        return view('Mybookings', compact('request','bookings'));
    }
    public function EditProfile()
    {
        $profile = session('u_email');
        $userprofile = registration::where('u_email', $profile)->first();

        return view('EditProfile',compact('userprofile'));
    }
    public function EditProfileAction(Request $request)
    {
        $request->validate([
            'file' => 'mimes:jpg,png,gif,jpeg',
            'name' =>'required|min:2|max:20|regex:/^[A-Za-z\s]+$/',
            'email' =>'required|email',
            'number' =>'required|numeric|max_digits:10|min_digits:10',
        ],[
            'file.mimes' => 'Profile Picture should be in JPEG, JPG, PNG or GIF format.',
            'name.required' => 'Name is required.',
            'name.min' => 'Name should be at least 2 characters long.',
            'name.max' => 'Name should not be more than 20 characters long.',
            'name.regex' => 'Name should only contain alphabetic characters and spaces.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email is not valid.',
            'number.required' => 'Phone number is required.',
            'number.numeric' => 'Phone number should only contain digits.',
            'number.max_digits' => 'Phone number should not exceed 10 digits.',
            'number.min_digits' => 'Phone number should not be less than 10 digits.',
        ]);
        $profile = session('u_email');
        $userprofile = registration::where('u_email', $profile)->first();
        if($request['file'])
        {
            $file_name = $request->file('file');
            $org_file_name = $file_name->getClientOriginalName();
            $file_name->move('images/profile', $org_file_name);
            $userprofile->u_image = $org_file_name;
        }
        
        $userprofile->u_name = $request->name;
        $userprofile->u_phone = $request->number;
        $userprofile->save();

        return view('Profile',compact('userprofile','request'));
    }
    public function ChangePassword()
    {
        return view('ChangePassword');
    }
    public function ChangePasswordAction(Request $request)
    {
        $validate = $request->validate([
            'oldpswd' => 'required',
            'newpswd' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
            'conpswd' => 'required|same:newpswd',
        ],[
            'oldpswd.required' => 'Old Password is required.',
            'newpswd.required' => 'New Password is required.',
            'newpswd.min' => 'New Password should be at least 8 characters long.',
            'newpswd.regex' => 'New Password should be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one digit, and one special character.',
            'conpswd.required' => 'Confirm Password is required.',
            'conpswd.same' => 'Confirm Password should match with New Password.',
        ]);
        
        $old = $validate['oldpswd'];
        $new = $validate['newpswd'];
        
        $profile = session('u_email');
        $user = registration::where('u_email', $profile)->first();

        if (Hash::check($old, $user->u_password)) {
            if ($old === $new) {
                return redirect('ChangePassword')->with('error', 'New Password cannot be the same as Old Password.');
            } else {
                $user->u_password = Hash::make($new);
                $user->save();
                session()->flush();
                session()->flash('success', 'Password Changed Successfully.');
                return redirect('login');
            }
        } else {
            return redirect('ChangePassword')->with('error', 'Old Password is incorrect.');
        }
    }
    public function coupon()
    {
        $activeOffers = Offer::where('status', 'Active')->get();
        return view('coupon', compact('activeOffers'));
    }
    public function couponAction(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'coupon' => 'required',
        ], [
            'coupon.required' => 'Coupon Code is required.',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }

        $total = $request->input('total'); 
        $activeOffers = Offer::where('status', 'Active')->first(); 

        if ($activeOffers && $request->coupon == $activeOffers->coupon_code) {
            // Apply discount
            $discount = $total * 0.20;
            $totalPrice = $total - $discount;

            // Retrieve user information
            $user = session('u_email');
            $users = registration::where('u_email', $user)->first();

            // Redirect to the payment form
            return view('payment_form', compact('totalPrice', 'users'));
        } else {
            // Return error if the coupon is invalid
            return redirect()->back()->with('error', 'Invalid Coupon Code.');
        }
    }

    public function CheckoutForm($id)
    {
        $room = room::find($id);
        $user = session('u_email');
        $users = registration::where('u_email', $user)->first();
        return view('CheckoutForm',compact('room','users'));
    }
    public function CheckoutFormAction(Request $request , $id)
    {
        $history = new bookinghistorie();
        $validate = Validator::make($request->all(),[
            'name' =>'required|min:2|max:20|regex:/^[A-Za-z\s]+$/',
            'email' =>'required|email',
            'number' =>'required|numeric|max_digits:10|min_digits:10',
            'checkin' => 'required|date|after_or_equal:today',
            'checkout' => 'required|date|after:checkin',
            'adults' => 'required|in:One,Two,Three',
            'child' => 'required|in:No,One,Two,Three',
            'special_requests' => 'nullable|string|max:500',
        ],[
            'name.required' => 'Name is required.',
            'name.min' => 'Name should be at least 2 characters long.',
            'name.max' => 'Name should not be more than 20 characters long.',
            'name.regex' => 'Name should only contain alphabetic characters and spaces.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email is required.',
            'number.required' => 'Phone number is required.',
            'number.numeric' => 'Phone number should only contain digits.',
            'number.max_digits' => 'Phone number should not exceed 10 digits.',
            'number.min_digits' => 'Phone number should not be less than 10 digits.',
            'checkin.required' => 'Check-in date is required.',
            'checkin.date' => 'Check-in must be a valid date.',
            'checkin.after_or_equal' => 'Check-in date must be today or a future date.',
            'checkout.required' => 'Check-out date is required.',
            'checkout.date' => 'Check-out must be a valid date.',
            'checkout.after' => 'Check-out date must be after the check-in date.',
            'adults.required' => 'Number of adults is required.',
            'adults.in' => 'Please select a valid number of adults.',
            'child.required' => 'Number of children is required.',
            'child.in' => 'Please select a valid number of children.',
            'special_requests.max' => 'Special requests should not exceed 500 characters.'
        ]);

        if($validate->fails())
        {
            return redirect()->back()->withErrors($validate->errors());
        }
        
        $checkin = Carbon::parse($request->checkin);
        $checkout = Carbon::parse($request->checkout);

        $days = $checkin->diffInDays($checkout);

        $room = Room::find($id);
        $pricePerDay = $room->r_price;
        $totalPrice = $days * $pricePerDay;
        $room_id = $room->id;
        $r_img = $room['r_image'];

        $history->b_image = $r_img ;
        $id = uniqid();
        $history->b_id = $id;
        $history->room_id = $room_id;
        $history->u_name = $request->name;
        $history->u_email = $request->email;
        $history->u_phone = $request->number;
        $history->checkin_date = $request->checkin;
        $history->checkout_date = $request->checkout;
        $history->adults = $request->adults;
        $history->children = $request->child;
        $history->total_price = $totalPrice;
        $history->save();

        // $b_id = uniqid();
        // $u_name = $request->name;
        // $u_email = $request->email;
        // $u_phone = $request->number;
        // $checkin_date = $request->checkin;
        // $checkout_date = $request->checkout;
        // $adults = $request->adults;
        // $children = $request->child;

        if($totalPrice >= 4000 )
        {
            $user = session('u_email');
            $users = registration::where('u_email', $user)->first();
            $activeOffers = Offer::where('status', 'Active')->get();
            return view('coupon',compact('totalPrice','users','activeOffers'));
            // $totalPrice = $totalPrice - ($totalPrice * 0.25);
        }

        $room = room::find($id);
        $user = session('u_email');
        $users = registration::where('u_email', $user)->first();
        return view('payment_form',compact('totalPrice','users'));
        // return view('payment_form',compact('totalPrice','users','u_name','u_email','u_phone','checkin_date','checkout_date','adults','children','b_id','room_id'));
    }
    public function ForgetPassword()
    {
        return view('ForgetPassword');
    }
    public function ForgetPasswordAction(Request $request)
    {
        $this->delete_token();

        $validate = $request->validate([
            'email' =>'required|email',
        ],[
            'email.required' => 'Email is required.',
            'email.email' => 'Email is not valid.',
        ]);
        $email = $validate['email'];
        $result = Registration::where('u_email', $email)->first();
        if (empty($result)) {
            session()->flash('error', 'Email id is not registered. please enter registered email address');
            return view('ForgetPassword');
        } else {
            $result = PasswordToken::where('email', $email)->first();
            if ($result) {
                session()->flash('success', 'A Password reset link is already sent to your mail please check. New link will be generated after old link expires');
                return view('ForgetPassword1');
            } else {
                date_default_timezone_set("Asia/Kolkata");
                $otp = mt_rand(100000, 999999);
                $data = Registration::where('u_email', $email)->first();
                $data2 = array('name' => $data->u_name, 'email' => $email, 'otp' => $otp);
                try {
                    Mail::Send('mail_forget_pwd', ["data3" => $data2], function ($message) use ($data2) {
                        $message->to($data2['email'], $data2['name'])->subject('Forget Password');
                        $message->from('bhuvadaksh78@gmail.com', 'Daksh Bhuva');
                    }); 
                } catch (Exception $ex) {
                    session()->flash('error', 'We encountered some error in sending the password reset token');
                    return view('ForgetPassword');
                }
                $expiry_time = Carbon::now()->addMinutes(2);
                $token_ins = new PasswordToken();
                $token_ins->email = $email;
                $token_ins->otp = $otp;
                session()->put('forgot_em', $email);
                //   $token_ins->token = $token;
                $token_ins->expiry_time = $expiry_time;
                if ($token_ins->save()) {
                    session()->flash('success', 'Password reset tokens sent to your registered email address');
                    return view('ForgetPassword1');
                } else {
                    session()->flash('error', 'Sorry the email address you entered is not registered.');
                    return view('ForgetPassword');
                }
            }
        }
        return view('ForgetPassword1',compact('request'));
    }
    public function ForgetPassword1(Request $request)
    {
        $this->delete_token();
        $this->check_token_expiry();
        return view('ForgetPassword1');
    }
    public function ForgetPassword1Action(Request $request)
    {
        $this->delete_token();
        $this->check_token_expiry();

        $validate = $request->validate([
            'otp' =>'required|min_digits:6|max_digits:6',
        ],[
            'otp.required' => 'OTP is required.',
            'otp.min_digits' => 'OTP should be exactly 6 digits long.',
            'otp.max_digits' => 'OTP should be exactly 6 digits long.',
        ]);
        $otp = $validate['otp'];
        $result = PasswordToken::where('email', session()->get('forgot_em'))->first();
        if ($result->otp == $otp) {
            session()->flash('success', 'OTP Verification is Successful');
            return view('ForgetPassword2');
        } else {
            session()->flash('error', 'Incorrect OTP');
            return view('ForgetPassword1');
        }
        return view('ForgetPassword2',compact('request'));
    }
    public function ForgetPassword2()
    {
        $this->delete_token();
        $this->check_token_expiry();
        return view('ForgetPassword2');
    }
    public function ForgetPassword2Action(Request $request)
    {        
        $validate = $request->validate([
            'pswd' =>'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
            'cpswd' =>'required|same:pswd',
        ],[
            'pswd.required' => 'Password is required.',
            'pswd.min' => 'Password should be at least 8 characters long.',
            'pswd.regex' => 'Password should be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one digit, and one special character.',
            'cpswd.required' => 'Confirm Password is required.',
            'cpswd.same' => 'Confirm Password should match with Password.',
        ]);
        $pswdhash = Hash::make($request->pswd);
        $updt = Registration::where('u_email', session()->get('forgot_em'))->update(array('u_password' => $pswdhash));
        if ($updt) {
            PasswordToken::where('email', session()->get('forgot_em'))->delete();
            session()->remove('forgot_em');
            session()->flash('success', 'Password updated successfully');
            return view('login');
        } else {
            session()->flash('error', 'Error in resetting password');
            return view('ForgetPassword');
        }
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        $rooms = Room::where('r_features', 'LIKE', "%$query%")
                        ->orWhere('r_facilities', 'LIKE', "%$query%")
                        ->orWhere('r_guests', 'LIKE', "%$query%")
                        ->get();
        return view('search-results', compact('rooms'));
    }
}
