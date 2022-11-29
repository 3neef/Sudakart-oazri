<?php

use App\Http\Controllers\Admin\AccountingController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\PromotionsController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\AnalysisController;
use App\Http\Controllers\Admin\ComplaintsController;
use App\Http\Controllers\Admin\NotifcationsController;
use App\Http\Controllers\Admin\RegionsController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\Auth\RegisterVendorController;
use App\Http\Controllers\CategoryRequestController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ExpenseTypeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\ProductsController as ControllersProductsController;
use App\Http\Controllers\ReturnedController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UpSellsController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::redirect('/admin', 'admin/login');

Route::post('register/vendor', [RegisterVendorController::class, 'register'])->name('admin.register.vendor');
Route::post('complete/register/vendor', [RegisterVendorController::class, 'completeRegistration'])->name('admin.complete.register.vendor');
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...
        Route::get('admin/login', function(){
            return view('auth.login');
        })->name('login.view');
        Route::get('complete/register/vendor/{id}', [RegisterVendorController::class, 'completepage'])->name('admin.complete-register.vendor');
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth:web', 'approved_vendor']], function () {
    Route::get('/dashboard',[AdminHomeController::class, 'index'])->name('dashboard');

    //products routes
    Route::get('/products',[ProductsController::class, 'index'])->name('products.index')->middleware('can:view-products');
    Route::get('/products/search',[ProductsController::class, 'search'])->name('products.search')->middleware('can:view-products');
    Route::get('/products/create',[ProductsController::class, 'create'])->name('products.create')->middleware('can:create-product');
    Route::get('/products/edit/{product}',[ProductsController::class, 'edit'])->name('products.edit')->middleware('can:edit-product');
    Route::delete('/products/destroy/{product}',[ProductsController::class, 'destroy'])->name('products.destroy')->middleware('can:delete-product');
    Route::get('/product/{product}',[ProductsController::class, 'stop'])->name('products.stop')->middleware('can:delete-product');
    Route::get('/products/show/{product}',[ProductsController::class, 'show'])->name('products.show')->middleware('can:view-products');
    Route::post('/products/create',[ControllersProductsController::class, 'store'])->name('products.store')->middleware('can:create-product');
    Route::put('/products/edit/{product}',[ControllersProductsController::class, 'update'])->name('products.update')->middleware('can:edit-product');
    Route::get('/products/suspended',[ProductsController::class, 'stoped'])->name('products.stoped')->middleware('can:delete-product');
    Route::get('/products/rates',[ProductsController::class, 'rates'])->name('products.rates')->middleware('can:view-product-reviews');
    Route::get('/products/getProducts',[OrdersController::class, 'getProducts'])->name('products.getProducts');
    Route::get('/products/getOptions',[OrdersController::class, 'getOptions'])->name('products.getOptions');
    Route::put('/order/newItem',[OrdersController::class, 'newItem'])->name('products.newItem');
    Route::get('/order/deleteItem/{id}',[OrdersController::class, 'deleteItem'])->name('products.deleteItem');

    //notifications
    // Route::get('notifications',[NotifcationsController::class, 'index'])->name('notifications.all');
    Route::get('read-all', [NotificationController::class, 'readAll'])->name('readAll');
    //orders routes
    Route::get('/orders',[OrdersController::class, 'index'])->name('orders.index')->middleware('can:view-orders');
    Route::get('/orders/search',[OrdersController::class, 'getOrder'])->name('order.search')->middleware('can:view-orders');
    Route::get('/orders/inbound',[OrdersController::class, 'inbound'])->name('orders.inbound')->middleware('can:view-orders');
    Route::get('/orders/inbound/status/{id}',[OrdersController::class, 'inboundedit'])->name('orders.inbound.edit')->middleware('can:view-orders');
    Route::put('/orders/inbound/status/{id}',[OrdersController::class, 'inboundstatus'])->name('orders.inbound.status')->middleware('can:view-orders');
    Route::get('/orders/outbound',[OrdersController::class, 'outbound'])->name('orders.outbound')->middleware('can:view-orders');
    Route::post('/orders/outbound/status/{id}',[OrdersController::class, 'outboundstatus'])->name('orders.outbound.status')->middleware('can:view-orders');
    Route::get('/orders/scheduled',[OrdersController::class, 'scheduled'])->name('orders.scheduled');
    Route::get('/orders/approved/{order}',[OrdersController::class, 'approved'])->name('orders.approve');
    Route::get('/orders/show/{order}',[OrdersController::class, 'show'])->name('orders.show');
    Route::get('/orders/print/{order}',[OrdersController::class, 'print'])->name('orders.print');
    Route::get('/orders/sendtoDelivery/{order}',[OrdersController::class, 'sendtoDelivery'])->name('orders.sendtoDelivery');
    Route::post('/orders/status/{order}',[OrdersController::class, 'statusupdate'])->name('orders.statusupdate');
    Route::put('/orders/handover/{order}',[OrdersController::class, 'handover'])->name('orders.handoverupdate');
    Route::get('/orders/cancel/{order}',[OrdersController::class, 'cancel'])->name('orders.cancel');
    Route::get('/orders/canceled',[OrdersController::class, 'canceled'])->name('orders.canceled')->middleware('can:view-canceled-orders');
    Route::get('/orders/returned',[OrdersController::class, 'returned'])->name('orders.returned')->middleware('can:view-returned-products');
    Route::put('/orders/returned/{id}',[ReturnedController::class, 'update'])->name('orders.returned.update')->middleware('can:view-returned-products');

    //accounting routes
    Route::group(['middleware' => ['can:view-payments']], function () {
    Route::get('/accounting/payments',[AccountingController::class, 'payments'])->name('accounting.payments');
    Route::get('/accounting/transactions',[AccountingController::class, 'transactions'])->name('accounting.transactions');
    Route::get('/accounting/wallets',[AccountingController::class, 'wallets'])->name('accounting.wallets');
    Route::get('/accounting/wallets/operation/{wallet}',[AccountingController::class, 'walletsoperation'])->name('accounting.wallets.operation');
    Route::get('/accounting/wallets/history/{wallet}',[AccountingController::class, 'wallethistory'])->name('accounting.wallets.history');
    Route::get('/accounting/expenses',[ExpenseController::class, 'index'])->name('accounting.expenses');
    Route::get('/accounting/expenses/create',[ExpenseController::class, 'create'])->name('accounting.expenses.create');
    Route::post('/accounting/expenses/create',[ExpenseController::class, 'store'])->name('accounting.expenses.store');
    Route::get('/accounting/expenses/edit/{expense}',[ExpenseController::class, 'edit'])->name('accounting.expenses.edit');
    Route::put('/accounting/expenses/edit/{expense}',[ExpenseController::class, 'update'])->name('accounting.expenses.update');
    Route::delete('/accounting/expenses/delete/{expense}',[ExpenseController::class, 'destroy'])->name('accounting.expenses.destroy');
    Route::get('/accounting/expensetypes',[ExpenseTypeController::class, 'index'])->name('accounting.expensetypes');
    Route::get('/accounting/expensetypes/create',[ExpenseTypeController::class, 'create'])->name('accounting.expensetypes.create');
    Route::post('/accounting/expensetypes/create',[ExpenseTypeController::class, 'store'])->name('accounting.expensetypes.store');
    Route::get('/accounting/expensetypes/edit/{id}',[ExpenseTypeController::class, 'edit'])->name('accounting.expensetypes.edit');
    Route::put('/accounting/expensetypes/edit/{id}',[ExpenseTypeController::class, 'update'])->name('accounting.expensetypes.update');
    Route::delete('/accounting/expensetypes/delete/{id}',[ExpenseTypeController::class, 'destroy'])->name('accounting.expensetypes.destroy');
    });
    //vendor routes
    Route::get('/vendors/pending/categories',[VendorController::class, 'pendingCategories'])->name('vendors.pending.categories');
    Route::get('/vendors/request/categories',[VendorController::class, 'requestcategory'])->name('vendors.pending.categories.request');
    Route::post('/vendors/request/categories',[CategoryRequestController::class, 'store'])->name('vendors.categories.request.store');
    Route::group(['middleware' => ['can:view-vendors']], function () {
    Route::get('/vendors',[VendorController::class, 'index'])->name('vendors');
    Route::get('/vendors/pending',[VendorController::class, 'pending'])->name('vendors.pending');
    Route::get('/vendor/suspend/{vendor}',[VendorController::class, 'suspend'])->name('vendors.suspend');
    Route::get('/vendor/approved/{vendor}',[VendorController::class, 'approved'])->name('vendors.approved');
    Route::get('/vendors/approve/categories/{id}',[VendorController::class, 'approvedcategory'])->name('vendors.pending.approvedcategory');
    Route::delete('/vendors/destroy/categories/{id}',[CategoryRequestController::class, 'destroy'])->name('vendors.pending.destroycategory');
    Route::get('/vendors/suspended',[VendorController::class, 'suspended'])->name('vendors.suspended');
    });
    Route::group(['middleware' => ['can:view-customers']], function () {
    Route::get('/customers',[VendorController::class, 'customers'])->name('customers');
    Route::get('/customers/vip',[VendorController::class, 'vipcustomers'])->name('customers.vip');
    });
    //PROMOTION routes
    Route::group(['middleware' => ['can:view-promotions']], function () {
    Route::get('offers',[PromotionsController::class, 'offers'])->name('offers');
    Route::get('offers/create',[PromotionsController::class, 'Createoffers'])->name('offers.create')->middleware('can:create-offer');
    Route::post('offers/create',[OffersController::class, 'store'])->name('offers.store')->middleware('can:create-offer');
    Route::delete('offers/destroy/{offer}',[OffersController::class, 'destroy'])->name('offers.destroy')->middleware('can:delete-offer');

    Route::get('coupons',[PromotionsController::class, 'coupons'])->name('coupons');
    Route::get('coupons/create',[PromotionsController::class, 'Createcoupons'])->name('coupons.create')->middleware('can:create-coupon');
    Route::post('coupons/create',[CouponsController::class, 'store'])->name('coupons.store')->middleware('can:create-coupon');
    Route::put('coupons/create/{coupon}',[CouponsController::class, 'update'])->name('coupons.update')->middleware('can:create-coupon');
    Route::delete('coupons/destroy/{coupon}',[CouponsController::class, 'destroy'])->name('coupons.destroy')->middleware('can:delete-coupon');


    Route::get('blogs',[PromotionsController::class, 'blogs'])->name('blogs');
    Route::put('blogs/{article}',[PromotionsController::class, 'approve'])->name('blogs.approve')->middleware('can:approve-category');
    Route::get('blogs/create',[PromotionsController::class, 'Createblogs'])->name('blogs.create')->middleware('can:create-blog');
    Route::post('blogs/create',[ArticlesController::class, 'store'])->name('blogs.store')->middleware('can:create-blog');
    Route::get('blogs/edit/{article}',[PromotionsController::class, 'edit'])->name('blogs.edit')->middleware('can:create-blog');
    Route::put('blogs/edit/{article}',[ArticlesController::class, 'update'])->name('blogs.update')->middleware('can:create-blog');
    Route::get('blogs/show/{article}',[PromotionsController::class, 'showblog'])->name('blogs.show')->middleware('can:create-blog');
    Route::delete('blogs/destroy/{article}',[ArticlesController::class, 'destroy'])->name('blogs.destroy')->middleware('can:delete-blog');

    Route::get('ads',[PromotionsController::class, 'ads'])->name('ads')->middleware('can:create-ads');
    Route::get('ads/create',[PromotionsController::class, 'adscreate'])->name('ads.create')->middleware('can:delete-ads');
    Route::post('ads/create',[SliderController::class, 'store'])->name('ads.store')->middleware('can:create-ads');
    Route::delete('ads/destroy/{slider}',[SliderController::class, 'destroy'])->name('ads.destroy')->middleware('can:delete-ads');
    Route::group(['middleware' => ['can:create-push-notification']], function () {
    Route::get('push/notifications',[PromotionsController::class, 'pushNotifications'])->name('pushnotifications');
    Route::get('push/notifications/send',[PromotionsController::class, 'SendpushNotifications'])->name('pushnotifications.create');
    Route::get('push/specified/notifications/send',[PromotionsController::class, 'SendspecifiedNotifications'])->name('push.specified.create');
    Route::post('push/notifications/send',[NotificationController::class, 'sendNotificationVendors'])->name('push.vendors.store');
    Route::post('push/specified/notifications/send',[NotificationController::class, 'sendNotificationSpecified'])->name('push.specified.store');
    Route::get('bulk',[PromotionsController::class, 'bulk'])->name('bulk');
    Route::get('bulk/send',[PromotionsController::class, 'Sendbulk'])->name('bulk.send');
    Route::get('whatsapp',[PromotionsController::class, 'whatsapp'])->name('whatsapp');
    Route::get('whatsapp/send',[PromotionsController::class, 'Sendwhatsapp'])->name('whatsapp.send');
    });
    });
    
    Route::get('upselling',[PromotionsController::class, 'upselling'])->name('upselling');
    Route::group(['middleware' => ['can:create-upselling']], function () {
    Route::get('upselling/create',[PromotionsController::class, 'Createupselling'])->name('upselling.create');
    Route::post('upselling/create',[UpSellsController::class, 'store'])->name('upselling.store');
    });
    Route::delete('upselling/destroy/{id}',[UpSellsController::class, 'destroy'])->name('offers.destroy')->middleware('can:delete-upselling');

    //dtat analytics routes
    Route::group(['middleware' => ['can:view-data-analysis']], function () {
    Route::get('products/most-viewed',[AnalysisController::class, 'mostviewed'])->name('products.get.mostviewed');

    Route::get('products/mostsold',[AnalysisController::class, 'mostsold'])->name('products.mostsold');
    Route::get('vendors/vip',[AnalysisController::class, 'vipvendor'])->name('vip.vendor')->middleware('can:data-analysis-vip-vendors');
    Route::get('blogs/mostviewed',[AnalysisController::class, 'mostviewedBlogs'])->name('blogs.mostviewed');
    Route::get('sales-returns',[AnalysisController::class, 'SalesVsReturns'])->name('sales.returns');
    });
    //complaints routes
    Route::group(['middleware' => ['can:view-complaint']], function () {
    Route::get('complaints',[ComplaintsController::class, 'index'])->name('complaints');
    Route::post('complaints',[ComplaintsController::class, 'store'])->name('complaints.store');
    Route::get('complaints/show/{id}',[ComplaintsController::class, 'show'])->name('complaints.show');
    Route::post('complaints/ticket/{id}',[ComplaintsController::class, 'asign'])->name('complaints.asign');
    Route::get('complaints/ticket',[ComplaintsController::class, 'ticket'])->name('complaints.ticket');
    Route::get('complaints/resloved',[ComplaintsController::class, 'resolved'])->name('complaints.resolved');
    });
    //System Users
    Route::get('users',[VendorController::class, 'users'])->name('users');

    //settings routes
    Route::group(['middleware' => ['can:view-settings']], function () {

    Route::get('categories',[SettingsController::class, 'categories'])->name('categories');
    Route::get('categories/create',[SettingsController::class, 'createcategory'])->name('categories.create');
    Route::post('categories/create',[SettingsController::class, 'storecategory'])->name('categories.store');
    Route::get('categories/edit/{category}',[SettingsController::class, 'editcategory'])->name('categories.edit');
    Route::put('categories/edit/{category}',[SettingsController::class, 'updatecategory'])->name('categories.update');
    Route::delete('categories/destroy/{category}',[SettingsController::class, 'destroycategory'])->name('categories.destroy');

    Route::get('delivery',[SettingsController::class, 'delivery'])->name('delivery');
    Route::get('delivery/create',[SettingsController::class, 'createdelivery'])->name('delivery.create');
    Route::post('delivery/create',[SettingsController::class, 'storedelivery'])->name('delivery.store');
    Route::get('delivery/edit/{id}',[SettingsController::class, 'editdelivery'])->name('delivery.edit');
    Route::put('delivery/edit/{id}',[SettingsController::class, 'updatedelivery'])->name('delivery.update');
    Route::delete('delivery/destroy/{id}',[SettingsController::class, 'destroydelivery'])->name('delivery.destroy');

    Route::get('attributes',[SettingsController::class, 'attribute'])->name('attributes');
    Route::get('attributes/create',[SettingsController::class, 'createattribute'])->name('attribute.create');
    Route::post('attributes/create',[SettingsController::class, 'storeattribute'])->name('attribute.store');
    Route::get('attributes/show/{id}',[SettingsController::class, 'showattribute'])->name('attribute.show');
    Route::get('attributes/edit/{id}',[SettingsController::class, 'editattribute'])->name('attribute.edit');
    Route::put('attributes/edit/{id}',[SettingsController::class, 'updateattribute'])->name('attribute.update');
    Route::delete('attributes/destroy/{id}',[SettingsController::class, 'destroyattribute'])->name('attribute.destroy');

    Route::get('reasons',[SettingsController::class, 'reason'])->name('reasons');
    Route::get('reasons/create',[SettingsController::class, 'createreason'])->name('reason.create');
    Route::post('reasons/create',[SettingsController::class, 'storereason'])->name('reason.store');
    Route::get('reasons/show/{id}',[SettingsController::class, 'showreason'])->name('reason.show');
    Route::get('reasons/edit/{id}',[SettingsController::class, 'editreason'])->name('reason.edit');
    Route::put('reasons/edit/{id}',[SettingsController::class, 'updatereason'])->name('reason.update');
    Route::delete('reasons/destroy/{id}',[SettingsController::class, 'destroyreason'])->name('reason.destroy');
    // roles routes
    Route::get('roles',[SettingsController::class, 'roles'])->name('roles');
    Route::get('role/{id}/edit',[SettingsController::class, 'rolesEdit'])->name('roles.edit');
    Route::put('role/{id}/update',[SettingsController::class, 'rolesUpdate'])->name('roles.update');
    Route::get('role/create',[SettingsController::class, 'rolesCreate'])->name('roles.create');
    Route::post('role/store',[SettingsController::class, 'rolesStore'])->name('roles.store');
    Route::get('role/{id}/delete',[SettingsController::class, 'rolesDelete'])->name('roles.delete');


    Route::get('commissions',[SettingsController::class, 'commissions'])->name('commissions');
    });

    Route::get('sales-report', [ReportsController::class, 'sales'])->name('sales-report');
    Route::get('sales-report-vendors', [ReportsController::class, 'salesindex'])->name('sales-report.request');
    Route::get('wallets-report', [ReportsController::class, 'wallets'])->name('wallets-report');
    Route::get('wallets-report-vendors', [ReportsController::class, 'walletsindex'])->name('wallets-report.request');
    Route::get('commissions-report', [ReportsController::class, 'commissions'])->name('commissions-report');
    Route::get('commissions-report-vendors', [ReportsController::class, 'commissionsindex'])->name('commissions-report.request');
    Route::get('expenses-report', [ReportsController::class, 'expenses'])->name('expenses-report');
    Route::get('expenses-report-vendors', [ReportsController::class, 'expensesindex'])->name('expenses-report.request');
    Route::get('profit-report', [ReportsController::class, 'profit'])->name('profit-report');
    Route::post('profit-report', [ReportsController::class, 'profitByYear'])->name('profit-report.year');

    Route::get('admin-create', [VendorController::class, 'admincreate'])->name('admin-create');
    Route::post('admin-create', [VendorController::class, 'adminstore'])->name('admin-create.store');

    Route::get('regions',[RegionsController::class, 'index'])->name('regions');
    Route::get('regions/create',[RegionsController::class, 'create'])->name('region.create');
    Route::post('regions/create',[RegionsController::class, 'store'])->name('region.store');
    Route::get('regions/show/{region}',[RegionsController::class, 'show'])->name('region.show');
    Route::get('regions/edit/{region}',[RegionsController::class, 'edit'])->name('region.edit');
    Route::put('regions/edit/{region}',[RegionsController::class, 'update'])->name('region.update');
    Route::delete('regions/destroy/{region}',[RegionsController::class, 'destroy'])->name('region.destroy');
});

});

require __DIR__.'/main.php';

require __DIR__.'/auth.php';
