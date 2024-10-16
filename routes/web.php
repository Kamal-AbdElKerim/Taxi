<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\SearcheController;
use App\Http\Controllers\PassagerController;
use App\Http\Controllers\ReservationController;
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







// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 


        Route::middleware(['auth', 'checkRole:admin'])->group(function () {
            
            Route::get('/dashboard_admin', [AdminController::class, 'dashboard'])->name('dashboard_admin');
            Route::get('/delete_Passager/{id}', [AdminController::class, 'delete_Passager'])->name('delete_Passager');
            Route::get('/restore_Passager/{id}', [AdminController::class, 'restore_Passager'])->name('restore_Passager');

            Route::get('/delete_driver/{id}', [AdminController::class, 'delete_driver'])->name('delete_driver');
            Route::get('/restore_driver/{id}', [AdminController::class, 'restore_driver'])->name('restore_driver');

            Route::get('/form_add_passeger', [AdminController::class, 'form_add_passeger'])->name('form_add_passeger');
            Route::post('/store_register_passager', [AdminController::class, 'store_register_passager'])->name('store_register_passager');

            Route::get('/reserv_passeger/{id}', [AdminController::class, 'reserv_passeger'])->name('reserv_passeger');
            Route::post('/search_forrm_passeger', [AdminController::class, 'search_forrm_passeger'])->name('search_forrm_passeger');
            Route::get('/affiche_card_passeger', [AdminController::class, 'affiche_card_passeger'])->name('affiche_card_passeger');




            
        });
        
        Route::middleware(['auth', 'checkRole:driver'])->group(function () {
            
            Route::get('/dashboard', [DriverController::class, 'dashboard'])->name('dashboard');
                  Route::get('/home_driver', [DriverController::class, 'index'])->name('dashboard_driver');

            Route::get('/start_travle/{id}', [DriverController::class, 'start_travle'])->name('start_travle');
            Route::get('/end_travle/{id}', [DriverController::class, 'end_travle'])->name('end_travle');

            
        });

        Route::middleware(['auth', 'checkRole:Passager'])->group(function () {
            



        Route::get('/dashboard_Passager', [PassagerController::class, 'dashboard'])->name('dashboard_Passager');
        Route::get('/Profile', [PassagerController::class, 'Profile'])->name('Profile');
        Route::post('/reservations/reserve', [ReservationController::class, 'reserve'])->name('reservations.reserve');
        Route::get('/delete_reserv/{id}', [ReservationController::class, 'delete_reserv'])->name('delete_reserv');
        Route::post('/add_rating/{id}', [ReviewsController::class, 'add_rating'])->name('add_rating');


            
        });

       
     

        Route::get('/', [SearcheController::class, 'index'])->name('index_searche');
        Route::post('/search_forrm', [SearcheController::class, 'search'])->name('search_forrm');
        Route::get('/affiche_card', [SearcheController::class, 'affiche_card'])->name('affiche_card');
        Route::post('/add_reservation', [ReservationController::class, 'add_reservation'])->name('add_reservation');



        
        Route::get('/dashboard_profile', function () {
            return view('Dashboard.avatar');
        })->middleware(['auth:web', 'verified'])->name('dashboard_profile');

        require __DIR__.'/auth.php';


    });
