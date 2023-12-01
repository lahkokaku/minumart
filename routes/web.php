<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\BeverageController;
use App\Http\Controllers\BeverageOrderController;

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
    return view('home');
});

Auth::routes();


//Beverage
Route::resource('beverages', BeverageController::class);

//Beverage Order 
Route::get('beverage-orders/finish-order', [BeverageOrderController::class, 'finishOrder'])->name('beverage-orders.finish-order');
Route::post('beverage-orders/checkout',[BeverageOrderController::class,'checkout'])->name('beverage-orders.checkout');

Route::get('/beverage-orders/{outlet?}', [BeverageOrderController::class, 'index'])->name('beverage-orders.index');
Route::resource('beverage-orders', BeverageOrderController::class)->except('index');


Route::resource('outlets', OutletController::class);