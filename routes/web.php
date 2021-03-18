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
//Auth::routes();
Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login');
Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register','Auth\LoginController@register');

Route::post('logout','Auth\LoginController@logout')->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', function () {
    return view('welcome',['title'=>'']);
});
Route::get('/home', function () {
    return view('welcome',['title'=>'SeterileSteamers']);
})->name('home');
Route::get('/contact', function () {
    return view('contact',['title'=>'SeterileSteamers']);
})->name('contact');
Route::get('product-info/{id}','WebSite\ProductController@productInfo')->name('product-info');
Route::get("accessories-list",'WebSite\AccessoryController@index')->name('accessories-list');
Route::get('accessory-info/{id}','WebSite\AccessoryController@accessoryInfo')->name('accessory-info');
Route::get('service-info/{id?}','WebSite\ServiceController@serviceInfo')->name('service-info');
Route::get('service-category/{id}','WebSite\ServiceCategoryController@index')->name('service-category');
Route::get('user-cart','WebSite\CartController@index')->name("user-cart");
Route::get('sai','WebSite\ProductController@sai');
Route::get('logincheck','WebSite\ProductController@logincheck');
Route::post('AddToCart','WebSite\CartController@addToCart');
Route::post('AddItemToCart','WebSite\CartController@addToCart');

//payment
Route::get('paymentpage',function ()
{
    return view('payWithRazorpay'); 
});
Route::post('PaymentSuccess','PaymentController@paymentSuccess')->name("payment_success");

Route::get('WorkSmarter',function ()
{
    return view('blogs.work_smarter',['title'=>'blogs']);
})->name('WorkSmarter');

Route::get("ProtectTheEarth",function ()
{
    return view('blogs.protect_the_earth',['title'=>'blogs']);
})->name('ProtectTheEarth');

Route::get("SaveMoney",function ()
{
    return view('blogs.save_money',['title'=>'blogs']);
})->name('SaveMoney');

Route::get("Testimonials",function ()
{
    return view('blogs.testimonials',['title'=>'blogs']);
})->name('Testimonials');

Route::get("SteamCarWash",function ()
{
    return view('blogs.steam_car_wash',['title'=>'blogs']);
})->name('SteamCarWash');

Route::post('OrderSummeryForm',"WebSite\CartController@createOrder");

Route::post('payment','WebSite\PaymentController@payment')->name('payment');

Route::get('pay','WebSite\PaymentController@pay')->name('pay');

Route::post('dopayment','WebSite\PaymentController@dopayment')->name('dopayment');


Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('admin.dashboard',['title'=>'dashboard']);
    })->name('dashboard');

    Route::get('/dashboard', function () {
        return view('admin.dashboard',['title'=>'dashboard']);
    });
    //product controller
    Route::resource('products', ProductController::class);
    Route::resource('products.features', ProductFeatureController::class);
    Route::resource('products.specifications', ProductSpecificationController::class);
    Route::resource('products.accessories', ProductAccessoryController::class);

    //addon plans controller
    Route::resource('plans', PlanController::class);
    Route::resource('plans.features', PlanFeatureController::class);

    //accessories controller
    Route::resource('accessories', AccessoryController::class);

    //features controller
    Route::resource('features', FeatureController::class);

    //services controller
    Route::resource('services', ServiceController::class);
    Route::resource('services.plans', ServicePlanController::class);
    Route::resource('services.categories', ServiceCategoryController::class);
    Route::resource('orders', OrderController::class);
});
