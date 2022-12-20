<?php

use App\Http\Controllers\API\V1\Client\Category\CategoryController as ClientCategory;
use App\Http\Controllers\API\V1\Client\Order\OrderController as ClientOrder;
use App\Http\Controllers\API\V1\Client\Product\ProductController as ClientProduct;
use App\Http\Controllers\API\V1\Client\Setting\SettingController as MerchantSetting;
use App\Http\Controllers\API\V1\Client\Slider\SliderController as ClientSlider;
use App\Http\Controllers\API\V1\Customer\CategoryController as CustomerCategory;
use App\Http\Controllers\API\V1\Customer\ProductController as CustomerProduct;
use App\Http\Controllers\Merchant\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



//client api
Route::prefix('v1/customer')->name('customer.')->group(function () {
    Route::get('categories', [CustomerCategory::class, 'index'])->name('categories.index');
    Route::get('categories/{category}', [CustomerCategory::class, 'show'])->name('categories.show');
    Route::get('products', [CustomerProduct::class, 'index'])->name('products.index');
    Route::get('products/{product}', [CustomerProduct::class, 'show'])->name('products.show');
});

//merchant api
Route::post('login', [LoginController::class, 'merchant_login'])->name('merchant.login');
Route::prefix('v1/client')->middleware('auth:api')->name('client.')->group(function () {
    Route::get('logout', [LoginController::class, 'merchant_logout'])->name('logout');
    Route::prefix('settings')->name('settings.')->group(function () {

        //business info
        Route::get('business-info', [MerchantSetting::class, 'business_info'])->name('business.info');
        Route::post('business-info/update', [MerchantSetting::class, 'business_info_update'])->name('business.info.update');

        //owner info
        Route::get('owner-info', [MerchantSetting::class, 'owner_info'])->name('owner.info');
        Route::post('owner-info/update', [MerchantSetting::class, 'owner_info_update'])->name('owner.info.update');

        //password & security
        Route::post('password-security/update', [MerchantSetting::class, 'password_security_update'])->name('password.security.update');

        //website
        Route::get('website', [MerchantSetting::class, 'website'])->name('website');
        Route::post('website/update', [MerchantSetting::class, 'website_update'])->name('website.update');
    });

    Route::get('/customers/{id}', [MerchantCustomerController::class, 'getCustomerByMerchant']);

    Route::get('sales-target',[SalesTargetController::class,'sales_target'])->name('sales.target');
    Route::post('sales-target/update',[SalesTargetController::class,'sales_target_update'])->name('sales.target.update');
    Route::post('orders/status/update',[ClientOrder::class,'order_status_update'])->name('orders.status.update');
    Route::resource('sliders', ClientSlider::class);
    Route::resource('orders', ClientOrder::class);
    Route::resource('products', ClientProduct::class);
    Route::resource('categories', ClientCategory::class);



});

Route::group(['prefix' => 'courier'], function () {
    Route::post('/send-order', [CourierController::class, 'sendOrderToCourier']);
    Route::post('/track-order', [CourierController::class, 'trackOrder']);
});


