<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageView;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Middleware\UserAuthentication;
use App\Http\Middleware\AdminAuthentication;

Route::get('/',[PageView::class,'Home']);
Route::get('login',[PageView::class,'login']);
Route::post('login',[PageView::class,'logindata']);
Route::get('register',[PageView::class,'register']);
Route::post('registrationdata',[PageView::class,'registrationdata']);
Route::get('verifyAccount/{u_email}/{u_token}', [PageView::class, 'verify_email']);
Route::get('MasterView',[PageView::class,'MasterView']);
Route::get('About',[PageView::class,'About']);
Route::get('ContactUs',[PageView::class,'ContactUs']);
Route::post('ContactUs',[PageView::class,'ContactUsAction']);
Route::get('ForgetPassword',[PageView::class,'ForgetPassword']);
Route::post('ForgetPassword',[PageView::class,'ForgetPasswordAction']);
Route::get('ForgetPassword1',[PageView::class,'ForgetPassword1']);
Route::post('ForgetPassword1',[PageView::class,'ForgetPassword1Action']);
Route::get('ForgetPassword2',[PageView::class,'ForgetPassword2']);
Route::post('ForgetPassword2',[PageView::class,'ForgetPassword2Action']);

Route::middleware([UserAuthentication::class])->group( function()
{
    Route::get('logout',[PageView::class,'logout']);
    Route::get('rooms',[PageView::class,'rooms']);
    Route::get('/search', [PageView::class, 'search'])->name('search');
    Route::get('Profile',[PageView::class,'Profile']);
    Route::get('EditProfile',[PageView::class,'EditProfile']);
    Route::post('EditProfile',[PageView::class,'EditProfileAction']);
    Route::get('ChangePassword',[PageView::class,'ChangePassword']);
    Route::post('ChangePassword',[PageView::class,'ChangePasswordAction']);
    Route::get('CheckoutForm/{id}', [PageView::class, 'CheckoutForm']);
    Route::post('CheckoutForm/{id}',[PageView::class,'CheckoutFormAction']);
    Route::get('Mybookings',[PageView::class,'Mybookings']);
    Route::get('Feedback/{id}',[PageView::class,'Feedback']);
    Route::post('Feedback/{id}',[PageView::class,'FeedbackAction']);
    Route::get('CancelledBooking/{id}',[PageView::class,'CancelledBooking']); 
    Route::get('coupon', [PageView::class, 'coupon'])->name('coupon.view');
    Route::post('coupon', [PageView::class, 'couponAction'])->name('coupon.action');    

    Route::get('/payment_form', [PaymentController::class, 'index'])->name('home');
    Route::get('/success', [PaymentController::class, 'success']);
    Route::post('/payment', [PaymentController::class, 'payment']);
    Route::post('/pay', [PaymentController::class, 'pay']);
    Route::get('/error', [PaymentController::class, 'error']);
});


Route::middleware([AdminAuthentication::class])->group(function()
{
    // Admin Panel Routes
    Route::get('master_admin',[AdminController::class,'master_admin']);
    Route::get('AdminMasterView',[AdminController::class,'AdminMasterView']);
    // Route::get('AdminLogin',[AdminController::class,'AdminLogin']);
    // Route::post('AdminLogin',[AdminController::class,'AdminLoginAction']);
    Route::get('AdminDashboard',[AdminController::class,'AdminDashboard']);
    Route::get('AdminProfile',[AdminController::class,'AdminProfile']);
    Route::get('AdminEditProfile',[AdminController::class,'AdminEditProfile']);
    Route::post('AdminEditProfile',[AdminController::class,'AdminEditProfileAction']);
    Route::get('AdminChangePassword',[AdminController::class,'AdminChangePassword']);
    Route::post('AdminChangePassword',[AdminController::class,'AdminChangePasswordAction']);
    
    Route::get('r_add',[AdminController::class,'r_add']);
    Route::post('r_add',[AdminController::class,'r_add_action']);
    Route::get('r_delete',[AdminController::class,'r_delete']);
    Route::post('r_delete',[AdminController::class,'r_delete_action']);
    Route::get('/r_delete_action_1/{id}',[AdminController::class,'r_delete_action_1'])->name('/r_delete_action_1');
    Route::get('r_update/{id}',[AdminController::class,'r_update'])->name('/r_update.show');
    Route::post('r_update/{id}',[AdminController::class,'r_update_action'])->name('/r_update.update');
    Route::get('r_data',[AdminController::class,'r_data']);
    
    Route::get('c_add',[AdminController::class,'c_add']);
    Route::post('c_add',[AdminController::class,'c_add_action']);
    Route::get('c_delete',[AdminController::class,'c_delete']);
    Route::post('c_delete',[AdminController::class,'c_delete_action']);
    Route::get('/c_delete_action_1/{id}',[AdminController::class,'c_delete_action_1'])->name('/c_delete_action_1');
    Route::get('c_update',[AdminController::class,'c_update']);
    Route::post('c_update',[AdminController::class,'c_update_action']);
    Route::get('c_data',[AdminController::class,'c_data']);
    
    Route::get('a_add',[AdminController::class,'a_add']);
    Route::post('a_add',[AdminController::class,'a_add_action']);
    Route::get('a_delete',[AdminController::class,'a_delete']);
    Route::post('a_delete',[AdminController::class,'a_delete_action']);
    Route::get('a_update',[AdminController::class,'a_update']);
    Route::post('a_update',[AdminController::class,'a_update_action']);
    
    Route::get('con_add',[AdminController::class,'con_add']);
    Route::post('con_add',[AdminController::class,'con_add_action']);
    Route::get('con_delete/{id}',[AdminController::class,'con_delete'])->name('/con_delete');
    Route::get('con_update',[AdminController::class,'con_update']);
    Route::post('con_update',[AdminController::class,'con_update_action']);
    Route::get('con_messages',[AdminController::class,'con_messages']);
    Route::post('con_messages',[AdminController::class,'con_messages_action']);
    Route::get('con_reply/{id}',[AdminController::class,'con_reply'])->name('/con_reply');
    Route::post('con_reply/{id}',[AdminController::class,'con_reply_action'])->name('/con_reply');
    
    Route::get('registered',[AdminController::class,'registered']);
    Route::get('/user_delete_action_1/{id}',[AdminController::class,'user_delete_action_1'])->name('/user_delete_action_1');
    Route::get('history',[AdminController::class,'history']);
    Route::get('/confirmationbooking/{id}',[AdminController::class,'confirmationbooking'])->name('/confirmationbooking');
    Route::get('/rejectionbooking/{id}',[AdminController::class,'rejectionbooking'])->name('/rejectionbooking');
    Route::get('/deleterecord/{id}',[AdminController::class,'deleterecord'])->name('/deleterecord');

    Route::get('users_feedback',[AdminController::class,'users_feedback']);
    Route::get('deletefeed/{id}',[AdminController::class,'deletefeed'])->name('/deletefeed');

    Route::get('add_offers',[AdminController::class,'add_offers']);
    Route::post('add_offers',[AdminController::class,'add_offers_action']);
    Route::get('update_status/{id}',[AdminController::class,'update_status'])->name('/update_status.show');
    Route::get('/delete_offers/{id}',[AdminController::class,'delete_offers'])->name('/delete_offers');
    Route::get('all_offers',[AdminController::class,'all_offers']);
});