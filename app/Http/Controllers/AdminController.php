<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Models\room;
use App\Models\carousel;
use App\Models\home_room;
use App\Models\about;
use App\Models\bookinghistorie;
use App\Models\feedback;
use App\Models\Offer;
use App\Models\contact_msg;
use Illuminate\Support\Facades\Hash;
use App\Models\registration;

class AdminController extends Controller
{
    // public function AdminLogin()
    // {
    //     return view('Admin/AdminLogin');
    // }
    // public function AdminLoginAction(Request $request)
    // {
    //     $request->validate([
    //         'email' =>'required',
    //         'pswd' => 'required',
    //     ],[
    //         'email.required' => 'Email is required',
    //         'pswd.required' => 'Password is required',
    //     ]);       
    //     return view('Admin/AdminDashboard',compact('request')); 
    // }
    public function master_admin()
    {
        return view('Admin/master_admin');
    }
    public function AdminProfile()
    {
        $profile = session('a_email');
        $userprofile = registration::where('u_email', $profile)->first();
        return view('Admin/AdminProfile',compact('userprofile'));
    }
    public function AdminEditProfile()
    {
        $profile = session('a_email');
        $userprofile = registration::where('u_email', $profile)->first();

        return view('Admin/AdminEditProfile',compact('userprofile'));
    }
    public function AdminEditProfileAction(Request $request)
    {
        {
            $request->validate([
                'file' => 'mimes:jpg,png,gif,jpeg',
                'name' =>'required|min:2|max:20|regex:/^[A-Za-z\s]+$/',
                'email' =>'required|email',
                'phone' =>'required|numeric|max_digits:10|min_digits:10',
            ],[
                'file.mimes' => 'Profile Picture should be in JPEG, JPG, PNG or GIF format.',
                'name.required' => 'Name is required.',
                'name.min' => 'Name should be at least 2 characters long.',
                'name.max' => 'Name should not be more than 20 characters long.',
                'name.regex' => 'Name should only contain alphabetic characters and spaces.',
                'email.required' => 'Email is required.',
                'email.email' => 'Email is not valid.',
                'phone.required' => 'Phone number is required.',
                'phone.numeric' => 'Phone number should only contain digits.',
                'phone.max_digits' => 'Phone number should not exceed 10 digits.',
                'phone.min_digits' => 'Phone number should not be less than 10 digits.',
            ]);
            $profile = session('a_email');
            $userprofile = registration::where('u_email', $profile)->first();
            if($request['file'])
            {
                $file_name = $request->file('file');
                $org_file_name = $file_name->getClientOriginalName();
                $file_name->move('images/profile', $org_file_name);
                $userprofile->u_image = $org_file_name;
            }
            
            $userprofile->u_name = $request->name;
            $userprofile->u_phone = $request->phone;
            $userprofile->save();
    
            return view('Admin/AdminProfile',compact('userprofile','request'));
        }
    }
    public function AdminChangePassword()
    {
        return view('Admin/AdminChangePassword');
    }
    public function AdminChangePasswordAction(Request $request)
    {
        $request->validate([
            'oldpswd' =>'required',
            'newpswd' =>'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
            'conpswd' =>'required|same:newpswd',
        ],[
            'oldpswd.required' => 'Old Password is required',
            'newpswd.required' => 'New Password is required',
            'newpswd.min' => 'New Password must be at least 8 characters long',
            'newpswd.regex' => 'New Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character',
            'conpswd.required' => 'Confirm Password is required',
            'conpswd.same' => 'Confirm Password must match with New Password',
        ]);
        $old = $request['oldpswd'];
        $new = $request['newpswd'];
        
        $profile = session('a_email');
        $userprofile = registration::where('u_email', $profile)->first();

        if (Hash::check($old, $userprofile->u_password)) {
            if ($old === $new) {
                session()->flash('error', 'New Password cannot be the same as Old Password.');
                return view('Admin/AdminChangePassword');
                
            } else {
                $userprofile->u_password = Hash::make($new);
                $userprofile->save();
                session()->flash('success', 'Password Changed Successfully.');
                return view('Admin/AdminProfile',compact('userprofile'));
            }
        } else {
            session()->flash('error', 'Old Password is incorrect.');
            return view('Admin/AdminChangePassword');
        }

        return view('Admin/AdminProfile',compact('request'));
    }
    public function AdminDashboard()
    {
        return view('Admin/AdminDashboard');
    }
    public function AdminMasterView()
    {
        return view('Admin/AdminMasterView');
    }
    public function r_add()
    {
        return view('Admin/rooms/r_add');
    }
    public function r_add_action(Request $request)
    {
        $room = new room(); 

        $validate = Validator::make($request->all(),[
            'description' => 'required|string|max:100|min:50',
            'price' =>'required|numeric',
            'features' => ['required',function($attribute, $request ,$fail){
                if (!is_array($request) || count($request) < 1) {
                    $fail('At least one features are required');
                }
            }],
            'facilities' => ['required',function($attribute, $request ,$fail){
                if (!is_array($request) || count($request) < 2) {
                    $fail('At least two facilities are required');
                }
            }],
            'guests' => ['required',function($attribute, $request ,$fail){
                if (!is_array($request) || count($request) < 1) {
                    $fail('At least one guests are required');
                }
            }],            
            'photo' => 'required|mimes:jpeg,jpg,png',
            
        ],[
            'description.required' => 'Room Description is required',
            'description.string' => 'Room Description must be a string',
            'description.max' => 'Room Description should not exceed 100 characters',
            'description.min' => 'Room Description should be at least 50 characters long',
            'price.required' => 'Room Price is required',
            'price.numeric' => 'Room Price must be a number',
            'features.required' => 'Select Room Features is required',
            'facilities.required' => 'Select Room Facilities is required',
            'guests.required' => 'Select Room Guests is required',
            'photo.required' => 'Room Image is required',
            'photo.mimes' => 'Room Image must be a jpeg, jpg, or png file',
        ]);
        if($validate->fails())
        {
            return redirect('r_add')->withInput()->withErrors($validate);
        }

        $file_name = $request->file('photo');
        $org_file_name = $file_name->getClientOriginalName();
        $file_name->move('images/rooms/', $org_file_name);

        $room->r_description = $request->description;
        $room->r_price = $request->price;
        $features = $request->input('features');
        $room->r_features = implode(" , ",$features);
        $facilities = $request->input('facilities');
        $room->r_facilities = implode(" , ",$facilities);
        $guests = $request->input('guests');
        $room->r_guests = implode(" , ",$guests);
        $room->r_image = $org_file_name;

        $room->save();

        $data = room::all();
        return view('Admin/rooms/r_data',compact('request','org_file_name','data'));
    }
    public function r_delete_action_1($id)
    {
        room::destroy($id);
        $data = room::all();
        return view('Admin/rooms/r_data',compact('data'));
    }
    public function r_delete()
    {
        return view('Admin/rooms/r_delete');
    }
    public function r_delete_action(Request $request)
    {
        $request->validate([
            'id' =>'required|numeric',
        ],[
            'id.required' => 'Room ID is required',
            'id.numeric' => 'Room ID must be a number',
        ]);
        room::destroy($request->id);
        return view('Admin/AdminDashboard',compact('request'));
    }
    public function r_update($id)
    {
        $room = room::find($id);

        $features = explode(" , ",$room->r_features);
        $facilities = explode(" , ",$room->r_facilities);
        $guests = explode(" , ",$room->r_guests);
        $price = $room->r_price;
        $description = $room->r_description;
        return view('Admin/rooms/r_update',compact('description','price','room','features','facilities','guests','id'));
    }
    public function r_update_action(Request $request, $id)
    {
        $room = room::find($id); 

        $validate = Validator::make($request->all(),[
            'description' => 'required|string|max:100|min:50',
            'price' =>'required|numeric',
            'features' => ['required',function($attribute, $request ,$fail){
                if (!is_array($request) || count($request) < 1) {
                    $fail('At least one features are required');
                }
            }],
            'facilities' => ['required',function($attribute, $request ,$fail){
                if (!is_array($request) || count($request) < 2) {
                    $fail('At least two facilities are required');
                }
            }],
            'guests' => ['required',function($attribute, $request ,$fail){
                if (!is_array($request) || count($request) < 1) {
                    $fail('At least one guests are required');
                }
            }],            
            'photo' => 'mimes:jpeg,jpg,png',
            
        ],[
            'description.required' => 'Room Description is required',
            'description.string' => 'Room Description must be a string',
            'description.max' => 'Room Description should not exceed 100 characters',
            'description.min' => 'Room Description should be at least 50 characters long',
            'price.required' => 'Room Price is required',
            'price.numeric' => 'Room Price must be a number',
            'features.required' => 'Select Room Features is required',
            'facilities.required' => 'Select Room Facilities is required',
            'guests.required' => 'Select Room Guests is required',
            'photo.mimes' => 'Room Image must be a jpeg, jpg, or png file',
        ]);
        if($validate->fails())
        {
            return redirect('r_add')->withInput()->withErrors($validate);
        }

        if($request['photo'])
            {
                $file_name = $request->file('photo');
                $org_file_name = $file_name->getClientOriginalName();
                $file_name->move('images/rooms/', $org_file_name);
                $room->r_image = $org_file_name;
            }
        $room->r_description = $request->description;
        $room->r_price = $request->price;
        $features = $request->input('features');
        $room->r_features = implode(" , ",$features);
        $facilities = $request->input('facilities');
        $room->r_facilities = implode(" , ",$facilities);
        $guests = $request->input('guests');
        $room->r_guests = implode(" , ",$guests);
        $room->save();
        
        $data = room::all();
        return view('Admin/rooms/r_data',compact('request','data'));
    }
    public function r_data()
    {
        $data = room::all();
        return view('Admin/rooms/r_data',compact('data'));
    }
    public function c_add()
    {
        return view('Admin/carousel/c_add');
    }
    public function c_add_action(Request $request)
    {
        $carousel = new carousel();
        $request->validate([
            'image' =>'required|mimes:jpeg,jpg,png',
        ],[
            'image.required' => 'Image is required',
            'image.mimes' => 'Image must be a jpeg, jpg, or png file',
        ]);

        $file_name = $request->file('image');
        $org_file_name = $file_name->getClientOriginalName();
        $file_name->move('images/carousel/', $org_file_name);

        $carousel->c_image = $org_file_name;
        $carousel->save();

        $data = carousel::all();
        return view('Admin/carousel/c_data',compact('request','org_file_name','data'));
    }
    public function c_delete()
    {
        return view('Admin/carousel/c_delete');
    }
    public function c_delete_action(Request $request)
    {
        $request->validate([
            'id' =>'required|numeric',
        ],[
            'id.required' => 'Image ID is required',
            'id.numeric' => 'Image ID must be a number',
        ]);
        return view('Admin/AdminDashboard',compact('request'));
    }
    public function c_delete_action_1($id)
    {
        carousel::destroy($id);
        $data = carousel::all();
        return view('Admin/carousel/c_data',compact('data'));
    }
    public function c_update()
    {
        return view('Admin/carousel/c_update');
    }
    public function c_update_action(Request $request)
    {
        $request->validate([
            'image' =>'required|mimes:jpeg,jpg,png',
        ],[
            'image.required' => 'Image is required',
            'image.mimes' => 'Image must be a jpeg, jpg, or png file',
        ]);
        $file_name = $request->file('image');
        $org_file_name = $file_name->getClientOriginalName();
        $file_name->move('uploads/', $org_file_name);
        return view('Admin/AdminDashboard',compact('request','org_file_name'));
    }
    public function c_data()
    {
        $data = carousel::all();
        return view('Admin/carousel/c_data',compact('data'));
    }
    public function a_add()
    {
        return view('Admin/about/a_add');
    }
    public function a_add_action(Request $request)
    {
        $about = new about();

        $validate = Validator::make($request->all(),[
            'town' =>'required|regex:/^[A-Za-z. \s]+$/',
            'aown' => 'required',
            'photo' =>'required|mimes:jpeg,jpg,png',
        ],[
            'town.required' =>'Owner Name Is Required',
            'town.regex' => 'Owner Name Must Contain Only Alphabets',
            'aown.required' => 'About Owner Is Required',
            'photo.required' => 'Owner Photo Is Required',
            'photo.mimes' => 'Owner Photo Must Be a JPG, JPEG, PNG Format',
        ]);

        if($validate->fails())
        {
            return redirect('a_add')->withInput()->withErrors($validate);
        }
        
        $file_name = $request->file('photo');
        $org_file_name = $file_name->getClientOriginalName();
        $file_name->move('images/about/', $org_file_name);

        $about->own_name = $request->town;
        $about->own_about = $request->aown;
        $about->own_image = $org_file_name;

        $about->save();
        
        return view('Admin/AdminDashboard',compact('request','org_file_name'));
    }
    public function a_delete()
    {
        return view('Admin/about/a_delete');
    }
    public function a_delete_action(Request $request)
    {
        $request->validate([
            'id' =>'required',
        ],[
            'id.required' => 'ID Is Required',
        ]);       
        return view('Admin/AdminDashboard',compact('request'));
    }
    public function a_update()
    {
        return view('Admin/about/a_update');
    }
    public function a_update_action(Request $request)
    {
        $request->validate([
            'id' =>'required',
            'town' =>'required|regex:/^[A-Za-z\s]+$/',
            'aown' => 'required',
            'photo' =>'mimes:jpeg,jpg,png',
        ],[
            'id.required' => 'ID Is Required',
            'town.required' =>'Owner Name Is Required',
            'town.regex' => 'Owner Name Must Contain Only Alphabets',
            'aown.required' => 'About Owner Is Required',
            'photo.mimes' => 'Owner Photo Must Be a JPG, JPEG, PNG Format',
        ]);       
        $file_name = $request->file('photo');
        $org_file_name = $file_name->getClientOriginalName();
        $file_name->move('uploads/', $org_file_name);
        return view('Admin/AdminDashboard',compact('request','org_file_name'));
    }
    public function con_add()
    {
        return view('Admin/contact/con_add');
    }
    public function con_add_action(Request $request)
    {
        $request->validate([
            'email' =>'required|email',
            'contact' =>'required|numeric|max_digits:10|min_digits:10',
            'addhot' =>'required|regex:/^[A-Za-z0-9\s]+$/u',
        ],[
            'email.required' => 'Email Is Required',
            'email.email' => 'Email Is Invalid',
            'contact.required' => 'Phone Number Is Required',
            'contact.numeric' => 'Phone Number Must Be Numeric',
            'contact.max_digits' => 'Phone Number Should Be 10 Digits',
            'contact.min_digits' => 'Phone Number Must Should Be 10 Digits',
            'addhot.required' => 'Address Is Required',
            'addhot.regex' => 'Address Must Contain Only Alphabets, Numbers, Spaces',
            
        ]);
        return view('Admin/AdminDashboard',compact('request'));
    }
    public function con_update()
    {
        return view('Admin/contact/con_update');
    }
    public function con_delete($id)
    {
        $msg = contact_msg::find($id);
        $msg->delete();
        $messages = contact_msg::all();
        return view('Admin/contact/con_messages',compact('messages'));
    }
    public function con_messages()
    {
        $messages = contact_msg::all();
        return view('Admin/contact/con_messages',compact('messages'));
    }
    public function con_reply($id)
    {
        $msg = contact_msg::find($id);
        return view('Admin/contact/con_reply',compact('msg'));
    }
    public function con_reply_action(Request $request,$id)
    {
        $validate = Validator::make($request->all(),[
            'subject' =>'required|max:10',
            'msg' =>'required',
        ],[
            'subject.required' => 'Subject Is Required',
            'subject.max' => 'Subject Should Not Be More Than 10 Characters',
            'msg.required' => 'Message Is Required',
        ]);

        if($validate->fails())
        {
            return redirect()->back()->withInput()->withErrors($validate);  
        }

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'msg' => $request->msg,
        );
        try {
            Mail::send(['text' => 'Admin/contact/con_reply_data'], ['data1' => $data], function($message) use ($data){
                $message->to($data['email']);
                $message->from('bhuvadaksh78@gmail.com');
                $message->subject($data['subject']);
            });
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send email : ' . $e->getMessage());
        }
        $messages = contact_msg::all();
        return view('Admin/contact/con_messages',compact('messages'));
    }
    public function registered()
    {
        $users = registration::all();
        return view('Admin/user/registered',compact('users'));
    }
    public function user_delete_action_1($id)
    {
        registration::destroy($id);
        $users = registration::all();
        return view('Admin/user/registered',compact('users'));
    }
    public function history()
    {
        $bookinghistories = bookinghistorie::all();
        return view('Admin/room_booking_history/history',compact('bookinghistories'));
    }
    public function confirmationbooking($id)
    {
        bookinghistorie::where('id', $id)->update(['b_status' => 'Confirmed']);

        $bookinghistories = bookinghistorie::all();
        return view('Admin/room_booking_history/history', compact('bookinghistories'));
    }
    public function rejectionbooking($id)
    {
        bookinghistorie::where('id', $id)->update(['b_status' => 'Rejected']);

        $bookinghistories = bookinghistorie::all();
        return view('Admin/room_booking_history/history', compact('bookinghistories'));
    }
    public function deleterecord($id)
    {
        bookinghistorie::where('id', $id)->delete();

        $bookinghistories = bookinghistorie::all();
        return view('Admin/room_booking_history/history', compact('bookinghistories'));
    }
    public function users_feedback()
    {
        $feedbacks = feedback::all();
        return view('Admin/feedback/users_feedback',compact('feedbacks'));
    }
    public function deletefeed($id)
    {
        feedback::where('id', $id)->delete();

        $feedbacks = feedback::all();
        return view('Admin/feedback/users_feedback', compact('feedbacks'));
    }
    public function add_offers()
    {
        return view('Admin/offers/add_offers');
    }
    public function add_offers_action(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:8|min:4',
        ],[
            'title.required' => 'Title Is Required',
            'title.string' => 'Title Must Be a String',
            'title.max' => 'Title Should Not Be More Than 255 Characters',
            'code.required' => 'Coupon Code Is Required',
            'code.string' => 'Coupon Code Must Be a String',
            'code.max' => 'Coupon Code Should Not Be More Than 8 Characters',
            'code.min' => 'Coupon Code Should Be At Least 4 Characters',
        ]);

        if($validate->fails())
        {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        $offer = new offer();
        $offer->title = $request->title;
        $offer->coupon_code = $request->code;
        $offer->save();

        $offers = offer::all();
        return view('Admin/offers/all_offers',compact('offers'));

    }
    public function update_status($id)
    {
        offer::where('id', $id)->update(['status' => 'Active']);
        $offers = offer::all();
        return view('Admin/offers/all_offers',compact('offers'));
    }
    public function delete_offers($id)
    {
        offer::where('id', $id)->delete();
        $offers = offer::all();
        return view('Admin/offers/all_offers',compact('offers'));
    }
    public function all_offers()
    {
        $offers = offer::all();
        return view('Admin/offers/all_offers',compact('offers'));
    }
}
