<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\HomeController;
use App\Http\Controllers\Main\ProductController;
use App\Http\Controllers\Main\BlogController;
use App\Http\Controllers\Main\CartController;
use App\Http\Controllers\Main\CategoryController;
use App\Http\Controllers\Main\GeneralController;
use App\Http\Controllers\Main\OrderController;
use App\Http\Controllers\Main\ProfileController;
use App\Http\Controllers\Auth\Main\UserController;
use App\Http\Controllers\Main\PaymentController;
use App\Http\Controllers\PaymentsCallbackController;
use App\Http\Controllers\PaymentsController;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(
        [
                'prefix' => LaravelLocalization::setLocale(),
                'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
        ], function(){ //...
       

Route::get('/',[HomeController::class,'index'])->name('home.web');
Route::get('contact',[GeneralController::class,'contact'])->name('contact');


Route::get('ProductsPerPage',[ProductController::class,'ProductsPerPage'])
        ->name('product.ProductsPerPage');

Route::get('product/catgory/{id}',[ProductController::class,'ProductByCategory'])
        ->name('product.category');
Route::get('product/{id}',[ProductController::class,'show'])->name('product.show');

// RESET PASSWORD SEND OTP VIEW
Route::post('profile/resetPasswordSendOTP',[ProfileController::class,'SendOTP'])
   ->name('profile.SendOTP');

Route::post('profile/VerfiyCode',[ProfileController::class,'VerfiyCode'])
  ->name('profile.VerfiyCode');

Route::get('profile/showVerfiyCode',[ProfileController::class,'showVerfiyCode'])
  ->name('profile.showVerfiyCode');

Route::get('profile/showResetPassoword',[ProfileController::class,'showResetPassoword'])
  ->name('profile.showResetPassoword');

Route::post('profile/passwordReset',[ProfileController::class,'passwordReset'])
  ->name('profile.update-password');

Route::post('profile/updatePassword',[ProfileController::class,'updatePassword'])
->middleware('user:web')->name('profile.updatePassword');


Route::get('profile/updatePassword',[ProfileController::class,'showUpdatePassword'])
->middleware('user:web')->name('profile.showUpdatePassword');
  
//

Route::get('profile/details/{id}',[ProfileController::class,'orderDetails'])
->middleware('user:web')->name('profile.myOrder.orderDetails');

Route::get('profile/order/refunds',[ProfileController::class,'refunds'])
        ->middleware('user:web')->name('profile.order.refunds');

Route::post('profile/returnProduct',[ProfileController::class,'returnProduct'])
->middleware('user:web')->name('profile.returnProduct');

Route::get('profile/myOrder',[ProfileController::class,'myOrder'])
        ->middleware('user:web')->name('profile.myOrder');

Route::get('profile/notifications/realAll',[ProfileController::class,'readAll'])
        ->middleware('user:web')->name('profile.readAll');

Route::get('profile/notifications',[ProfileController::class,'notifications'])
        ->middleware('user:web')->name('profile.notifications');

Route::get('profile',[ProfileController::class,'index'])
        ->middleware('user:web')->name('profile.index');

Route::resource('blog',BlogController::class)->only('show','index');
Route::resource('category',CategoryController::class)->only('show','index');


Route::get('search',[GeneralController::class,'Search'])
        ->name('general.search');

Route::get('wishlist',[GeneralController::class,'wishlist'])->middleware('user:web')->name('wishlist.index');

Route::get('cart',[CartController::class,'index'])->name('cart.index');



Route::get('checkout',[CartController::class,'checkout'])
        ->middleware('user:web')->name('cart.checkout');
Route::get('checkout?success=true',[CartController::class,'checkout'])
->middleware('user:web')->name('checkout.success-url');
Route::get('checkout?cancel=true',[CartController::class,'checkout'])
->middleware('user:web')->name('checkout.cancel-url');
Route::get('orderPlaced/{id}',[CartController::class,'orderPlaced'])
        ->middleware('user:web')->name('cart.orderPlaced');



Route::post('order',[OrderController::class,'store'])
   ->middleware('user:web')->name('order.store');

Route::get('order/cancelOrder/{id}',[OrderController::class,'cancelOrder'])
    ->middleware('user:web')->name('main.order.cancelOrder');


// payments route 
Route::get('payment/complete',[PaymentController::class,'store'])
   ->middleware('user:web')->name('checkout.payment.complete');
Route::get('payment/cancel',[PaymentController::class,'cancel'])
->middleware('user:web')->name('checkout.payment.cancel');
Route::get('payment/pay-now/{id}',[PaymentController::class,'payNow'])
   ->middleware('user:web')->name('checkout.payment.paynow');

Route::view('about','main.about')->name('about');
Route::view('policies','main.policy')->name('policies');
Route::view('return-policy','main.return-policy')->name('return-policy');

Route::view('terms','main.terms')->name('terms');
Route::view('fAQs','main.faqs')->name('faqs');





// login routes
Route::get('customerLogin',[UserController::class,'showLoginForm'])->name('login.web');
Route::post('customerLogin',[UserController::class,'login'])->name('customer.doLogin');

// register route
Route::get('customerRegister',[UserController::class,'create'])->name('customer.register');
Route::post('customerRegister',[UserController::class,'register'])->name('customer.doRegister');

// verfiy routes
Route::post('customerVerfiy',[UserController::class,'verify'])->name('customer.register.verfiy');
Route::get('customerVerfiy',[UserController::class,'ShowVerfiyForm'])->name('customer.register.show');


});

Route::post('addTocartWithOptions',[CartController::class,'addTocartWithOptions'])->name('cart.addTocartWithOptions');
Route::post('updateCart',[CartController::class,'updateCart'])->name('cart.updateCart');
Route::post('addTocart',[CartController::class,'addTocart'])->name('cart.addTocart');
Route::post('applyCoupon',[CartController::class,'applyCoupon'])->name('cart.applyCoupon');

// logout route
Route::post('Customerlogout', [UserController::class, 'logout'])
                ->name('customer.logout');

Route::get('payments/create', [PaymentsController::class, 'create'])->name('payments.create');
Route::get('/payments/callback/success', [PaymentsCallbackController::class, 'success'])->name('payments.success');
Route::get('/payments/callback/cancel', [PaymentsCallbackController::class, 'cancel'])->name('payments.cancel');
