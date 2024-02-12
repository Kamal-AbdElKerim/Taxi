<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ProfileController;
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
            
            Route::get('/dashboard_admin', function () {
                return view('Dashboard.admin.index');
            })->name('dashboard_admin');
            
        });
        
        Route::middleware(['auth', 'checkRole:driver'])->group(function () {
            
            Route::get('/dashboard', [DriverController::class, 'dashboard'])->name('dashboard');
            Route::get('/start_travle/{id}', [DriverController::class, 'start_travle'])->name('start_travle');
            Route::get('/end_travle/{id}', [DriverController::class, 'end_travle'])->name('end_travle');

            
        });

        Route::middleware(['auth', 'checkRole:Passager'])->group(function () {
            



        Route::get('/dashboard_Passager', [PassagerController::class, 'dashboard'])->name('dashboard_Passager');
        Route::get('/Profile', [PassagerController::class, 'Profile'])->name('Profile');
        Route::post('/reservations/reserve', [ReservationController::class, 'reserve'])->name('reservations.reserve');
        Route::get('/delete_reserv/{id}', [ReservationController::class, 'delete_reserv'])->name('delete_reserv');


            
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
