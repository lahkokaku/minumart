<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeverageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;

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

Auth::routes();
Route::get('/login-admin', [LoginController::class, 'showLoginAdmin'])->name('show-login-admin');
Route::post('/login-admin', [LoginController::class, 'loginAdmin'])->name('login-admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('beverages', BeverageController::class);

Route::controller(DashboardController::class)->prefix('dashboards')->name('dashboards.')->group(function(){
    Route::get('admin', 'admin')->name('admin');
});