<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('verify/')->group(function () {
    Route::post('start', 'Auth\PhoneVerificationController@startVerification');
    Route::post('verify', 'Auth\PhoneVerificationController@verifyCode');
});

Route::get('products','WebServices\WebServicesController@products');
Route::get('product/{product_id}','WebServices\WebServicesController@productDetails');
Route::get('accessories','WebServices\WebServicesController@accessories');
Route::get('accessory/{accessory_id}','WebServices\WebServicesController@accessoryDetails');
Route::get('services','WebServices\WebServicesController@services');
Route::get("serviceCategories/{service_id}",'WebServices\WebServicesController@serviceCategories');
Route::get('cartItems/{user_id}','WebServices\WebServicesController@cartItems');
Route::post('AddToCart','WebServices\WebServicesController@addToCart');
Route::post('profileUpdate','WebServices\WebServicesController@updateProfile');
Route::post("AddOrderSummery",'WebServices\WebServicesController@createOrderSummery');
Route::post('OrderUpdate','WebServices\WebServicesController@orderUpdate');
Route::get("UserOrders/{user_id}",'WebServices\WebServicesController@userOrders');
Route::get('PendingServices','WebServices\WebServicesController@pendingServices');
Route::get("ServiceDetails",'WebServices\WebServicesController@serviceDetails');
//Route::get('orderid','WebSite\PaymentController@generateOrderId');