<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\DashboardController;

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
    return view('pages.landingpage.index');
});


Route::get('/login', [LoginController::class,'index'])->name('login');
Route::get('/register', [LoginController::class,'register'])->name('register');
// Route::get('/admin', [DashboardController::class,'index'])->name('admin');

// Landing page
Route::group(['prefix' => 'landingpage'], function() {
Route::get('/', [LandingPageController::class,'index'])->name('landingpage');
Route::get('/detail-bali', [LandingPageController::class,'detail_bali'])->name('detail-bali');
Route::get('/detail-nusapenida', [LandingPageController::class,'detail_nusapenida'])->name('detail-nusapenida');
Route::get('/checkout', [LandingPageController::class,'checkout'])->name('checkout-index');
Route::get('/success', [LandingPageController::class,'success'])->name('success-index');
});
