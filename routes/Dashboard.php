<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Profile_Admin_Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::group(
  [
      'prefix' => LaravelLocalization::setLocale(),
      'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
  ], function(){ 

    Route::middleware(['auth', 'checkRole:driver'])->group(function () {

      Route::get('/profile_edit', [DriverController::class, 'profile'])->name('profile');
      Route::post('Store_profile', [DriverController::class, 'Store_profile'])->name('Store_profile');
      Route::get('/home_driver', [DriverController::class, 'index'])->name('dashboard_driver');
      Route::post('/add_route', [DriverController::class, 'add_route'])->name('add_route');

      
  });

    // Route::get('/Profile_admin', [Profile_Admin_Controller::class, 'index'])->middleware('auth:Admin')->name('Profile_admin');
    // Route::post('/Profile_update/{id}', [Profile_Admin_Controller::class, 'update'])->middleware('auth:Admin')->name('Profile_update_admin');

    Route::get('/Profile_admin', [Profile_Admin_Controller::class, 'index'])->middleware('auth:Admin')->name('Edit_Profile_admin');
    Route::post('/Edit_Profile_admin/{id}', [Profile_Admin_Controller::class, 'update'])->middleware('auth:Admin')->name('Profile_update_admin');


  });



//  Route::get("/Dashboard_Admin",[DashboardController::class , "index"]);