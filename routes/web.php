<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\BeverageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TransactionController;
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

// Auth
Auth::routes();
Route::get('/login-admin', [LoginController::class, 'showLoginAdmin'])->name('show-login-admin');
Route::post('/login-admin', [LoginController::class, 'loginAdmin'])->name('login-admin');


// Beverage
Route::resource('beverages', BeverageController::class);

// Dashboard
Route::controller(DashboardController::class)->prefix('dashboards')->name('dashboards.')->group(function(){
    Route::get('user', 'user')->name('user');
    Route::get('admin', 'admin')->name('admin');
});

// Beverage Order 
Route::controller(BeverageOrderController::class)->prefix('beverage-orders')->name('beverage-orders.')->group(function(){
    Route::get('finish-order', 'finishOrder')->name('finish-order');
    Route::post('checkout','checkout')->name('checkout');
    Route::get('{outlet?}', 'index')->name('index');
});
Route::resource('beverage-orders', BeverageOrderController::class)->except('index');

// Transaction
Route::controller(TransactionController::class)->prefix('transactions')->name('transactions.')->group(function(){
    Route::get('manage', 'manage')->name('manage');
    Route::get('{transactionHeader}/detail', 'detail')->name('detail');
    Route::put('{id}/update-status-admin', 'updateStatusAdmin')->name('update-status-admin');
});

// Outlet
Route::resource('outlets', OutletController::class);