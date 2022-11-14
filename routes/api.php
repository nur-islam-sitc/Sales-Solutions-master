<?php

use App\Http\Controllers\API\V1\Client\Category\CategoryController as ClientCategory;
use App\Http\Controllers\API\V1\Client\Product\ProductController as ClientProduct;
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
Route::prefix('v1/customer')->name('customer.')->group(function(){
    Route::get('categories',[CustomerCategory::class,'index'])->name('categories.index');
    Route::get('categories/{category}',[CustomerCategory::class,'show'])->name('categories.show');
    Route::get('products',[CustomerProduct::class,'index'])->name('products.index');
    Route::get('products/{product}',[CustomerProduct::class,'show'])->name('products.show');
});

//merchant api
Route::post('login', [LoginController::class,'merchant_login'])->name('merchant.login');
Route::prefix('v1/client')->middleware('auth:api')->name('client.')->group(function(){
    Route::resource('categories',ClientCategory::class);
    Route::resource('products',ClientProduct::class);
});
