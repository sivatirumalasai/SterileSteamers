<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('welcome');
})->name('home');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('product-info/{id}','WebSite\ProductController@productInfo')->name('product-info');
Route::get("accessories-list",'WebSite\AccessoryController@index')->name('accessories-list');
Route::get('accessory-info/{id}','WebSite\AccessoryController@accessoryInfo')->name('accessory-info');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('product-feature/{id}','ProductController@features')->name('product-feature');
    Route::get('product-feature-create/{id}','ProductController@createFeature')->name('product-feature-create');
    Route::post('product-feature-store/{id}','ProductController@storeFeature')->name('product-feature-store');
    Route::get('product-accessories/{id}','ProductController@accessories')->name('product-accessories');
    Route::get('product-accessories-create/{id}','ProductController@createAccessories')->name('product-accessories-create');
    Route::post('product-accessories-store/{id}','ProductController@storeAccessories')->name('product-accessories-store');
    Route::get('product-specifications/{id}','ProductController@specifications')->name('product-specifications');
    Route::post('product-specifications-store/{id}','ProductController@storeSpecifications')->name('product-specifications-store');
    Route::get('product-specifications-create/{id}','ProductController@createSpecifications')->name('product-specifications-create');
    Route::resource('products', ProductController::class);
    Route::resource('accessories', AccessoryController::class);
});