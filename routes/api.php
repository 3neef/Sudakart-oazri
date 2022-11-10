<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterAdminController;
use App\Http\Controllers\Auth\RegisterCustomerController;
use App\Http\Controllers\Auth\RegisterVendorController;
use App\Http\Controllers\Auth\RegisterDriverController;
use App\Http\Controllers\Auth\PhoneVerificationController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AttributesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OptionsController;
use App\Http\Controllers\ShopsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductOptionsController;
use App\Http\Controllers\FavouritesController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\RatesController;
use App\Http\Controllers\DeliveryMethodsController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\StatesController;
use App\Http\Controllers\AdvertisementsController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\UpSellsController;
use App\Http\Controllers\ReturnedController;
use App\Http\Controllers\OrderProductsController;
use App\Http\Controllers\MarketsController;
use App\Http\Controllers\CategoryRequestController;
use App\Http\Controllers\CanceledOrdersController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PaymentsCallbackController;
use App\Http\Controllers\ReasonController;
use App\Http\Controllers\SliderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// use Illuminate\Support\Facades\Http;

// Route::get('sms',function (){
//     $res = Http::get('http://196.202.134.90/SMSbulk/webacc.aspx', [
//             'user' => config('services.sms.username'),
//             'pwd' => config('services.sms.password'),
//             'Sender'   => config('services.sms.sender'),
//             'smstext'  => '# ',
//             'Nums'  => '249'
//     ]);
//     return dd($res);
// });


Route::apiResource('states', StatesController::class)->only('index');
Route::apiResource('reasons', ReasonController::class)->only('index');
Route::apiResource('markets', MarketsController::class)->only('index');
Route::apiResource('categories', CategoriesController::class)->only('index');
Route::apiResource('articles', ArticlesController::class)->only('index');
Route::apiResource('products', ProductsController::class)->only(['index','show']);
Route::apiResource('rates', RatesController::class)->only('index');
Route::apiResource('sliders', SliderController::class)->only(['index','store','destroy']);

Route::post('forgot-password', [PasswordResetLinkController::class, 'store']);
Route::get('shop-categories', [CategoriesController::class, 'shopcategories']);

Route::get('products-by-category/{category}',[ProductsController::class, 'showByCategory'])->name('products.showByCategory');
Route::get('orders/customer',[OrdersController::class, 'customerOrder']);
Route::get('orders/vendor',[OrdersController::class, 'VendorOrder']);
Route::get('orders/vendor/{id}',[OrdersController::class, 'VendorOrderShow']);
Route::get('orders/driver',[OrdersController::class, 'driverOrder']);
Route::get('rate/vendor',[RatesController::class, 'vendorRate']);
Route::get('deals',[ProductsController::class, 'deal']);
Route::get('stats',[RegisterVendorController::class, 'stats']);
Route::get('rates/product/{id}',[RatesController::class, 'productrate']);

Route::post('register/customer', [RegisterCustomerController::class, 'register'])->name('register.customer');
Route::post('register/vendor', [RegisterVendorController::class, 'register'])->name('register.vendor');
Route::post('complete-registration/vendor', [RegisterVendorController::class, 'completeRegistration'])->name('register.vendor');
Route::post('complete-registration/customer', [RegisterCustomerController::class, 'completeRegistration'])->name('register.customer');
Route::post('complete-registration/driver', [RegisterDriverController::class, 'completeRegistration'])->name('register.driver');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('password/forgot', [PasswordResetController::class, 'forgotPassword'])->name('password.forgot');
Route::post('password/check-code', [PasswordResetController::class, 'checkCode'])->name('check.code');
Route::post('password/reset', [PasswordResetController::class, 'resetPassword'])->name('password.reset');

Route::put('verify/resend/{phone}', [PhoneVerificationController::class, 'resend'])->name('phone.verification.resend');
Route::put('verify/{phone}', [PhoneVerificationController::class, 'verify'])->name('phone.verification');
Route::get('most', [ProductsController::class, 'mostviews']);
Route::get('random', [ProductsController::class, 'random']);
Route::get('read-all', [NotificationController::class, 'readAll']);
Route::post('register/admin', [RegisterAdminController::class, 'register']);
Route::get('coupons/{coupon:code}', [CouponsController::class, 'showbycode']);
Route::get('orderprodcuts', [OrderProductsController::class, 'index']);
Route::get('inbound', [OrderProductsController::class, 'index']);
Route::put('inbound/{id}', [OrderProductsController::class, 'InboundUpdate']);
Route::get('outbound', [OrdersController::class, 'index']);
Route::get('payment/top/complete/{id}/{amount}', [PaymentsCallbackController::class, 'topsuccess'])->name('api.payment.top.success');
Route::get('payment/complete/{id}', [PaymentsCallbackController::class, 'success'])->name('api.payment.success');
Route::get('payment/cancel/{id}', [PaymentsCallbackController::class, 'cancel'])->name('api.payment.cancel');
Route::get('payment/top/cancel/{id}', [PaymentsCallbackController::class, 'topcancel'])->name('api.payment.top.cancel');
Route::get('payment/pay-now/{id}',[PaymentsCallbackController::class,'payNow'])->name('api.payment.top.paynow');

Route::put('outbound/{id}', [OrdersController::class, 'Outboundupdate']);
Route::post('deposit', [WalletController::class, 'deposit'])->name('deposit');
Route::post('withdraw', [WalletController::class, 'withdraw'])->name('withdraw');
Route::post('top-up', [WalletController::class, 'TopUp'])->name('TopUp');
Route::group(['middleware' => ['auth:api']], function () {
    Route::put('products/stop/{product}', [ProductsController::class, 'stopProduct']);
    Route::get('products/stoped',[ProductsController::class, 'stoped']);

    Route::put('profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
    Route::put('profile/update-phone', [ProfileController::class, 'updatePhone'])->name('profile.update-phone');

    Route::post('register/driver', [RegisterDriverController::class, 'register']);


    Route::apiResource('delivery-methods', DeliveryMethodsController::class)->except(['show', 'update']);
    Route::apiResource('profile', ProfileController::class)->only(['show', 'update']);
    Route::apiResource('shops', ShopsController::class)->except(['store', 'destroy']);
    Route::apiResource('categories-requests', CategoryRequestController::class)->only(['store', 'index', 'update']);
    Route::apiResource('categories', CategoriesController::class)->except(['index']);
    Route::apiResource('attributes', AttributesController::class)->except(['show', 'update']);
    Route::apiResource('options', OptionsController::class)->only(['store', 'destroy']);
    Route::apiResource('products', ProductsController::class)->only(['store', 'update' ,'destroy']);
    Route::apiResource('product-options', ProductOptionsController::class)->only(['destroy']);
    Route::apiResource('favourites', FavouritesController::class)->only(['index','store']);
    Route::apiResource('carts', CartsController::class)->except(['show', 'update']);
    Route::apiResource('offers', OffersController::class);
    Route::apiResource('coupons', CouponsController::class)->except(['show']);
    Route::apiResource('rates', RatesController::class)->except(['index', 'show', 'update']);
    Route::apiResource('transactions', TransactionsController::class)->only('index');
	Route::apiResource('wallets', WalletController::class)->only('index');
    Route::apiResource('notification', NotificationController::class)->only('index');
    Route::apiResource('articles', ArticlesController::class)->except(['index']);
    Route::apiResource('comments', CommentsController::class)->only(['store', 'destroy']);
    Route::apiResource('ads', AdvertisementsController::class)->except(['show', 'update']);
    Route::apiResource('orders', OrdersController::class)->except([ 'destroy',]);
    Route::apiResource('upsells', UpSellsController::class )->except(['show']);
    Route::apiResource('returning', ReturnedController::class)->only(['index', 'store', 'update']);
    Route::apiResource('canceled', CanceledOrdersController::class)->only(['index', 'store', 'update']);
});

