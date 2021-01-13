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