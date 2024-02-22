<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

// Common Routes
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('login', [HomeController::class, 'login'])->name('login');
Route::post('loggedin', [HomeController::class, 'loggedin'])->name('loggedin');
Route::get('signup', [HomeController::class, 'signup'])->name('signup');
Route::post('register', [HomeController::class, 'register'])->name('register');
Route::get('logout', [HomeController::class, 'logout'])->name('logout');
Route::get('categories', [HomeController::class, 'categories'])->name('categories');
Route::get('subcategories/{id}', [HomeController::class, 'subcategories'])->name('subcategories');
Route::get('services/{id}', [HomeController::class, 'services'])->name('services');
Route::get('termsandconditions', [HomeController::class, 'termsandconditions'])->name('termsandconditions');
Route::get('privacypolicy', [HomeController::class, 'privacypolicy'])->name('privacypolicy');
Route::get('refundpolicy', [HomeController::class, 'refundpolicy'])->name('refundpolicy');

/// Login Required
Route::middleware('check.user')->group(function () {
    Route::get('myaccount', [BookingController::class, 'myaccount'])->name('myaccount');
    Route::get('myaddress', [BookingController::class, 'myaddress'])->name('myaddress');
    Route::get('servicesdetails/{id}', [BookingController::class, 'servicesdetails'])->name('servicesdetails');
    Route::get('addtocart/{service_id}', [BookingController::class, 'addtocart'])->name('addtocart');
    Route::get('removecart/{service_id}', [BookingController::class, 'removecart'])->name('removecart');
    Route::get('buynow/{service_id}', [BookingController::class, 'buynow'])->name('buynow');
    Route::get('promos', [BookingController::class, 'promos'])->name('promos');
    Route::get('cart', [BookingController::class, 'cart'])->name('cart');
    Route::post('applycoupon', [BookingController::class, 'applycoupon'])->name('applycoupon');
    Route::post('placeorder', [BookingController::class, 'placeorder'])->name('placeorder');
    Route::get('successful', [BookingController::class, 'successful'])->name('successful');

    // Route::get('helpsupport', [BookingController::class, 'helpsupport'])->name('helpsupport');
    // Route::get('tickets', [BookingController::class, 'tickets'])->name('tickets');
    // Route::get('myorders', [BookingController::class, 'myorders'])->name('myorders');
    // Route::get('finalbooking', [BookingController::class, 'finalbooking'])->name('finalbooking');
});

