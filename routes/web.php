<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearcheController;
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

            
        });

        Route::middleware(['auth', 'checkRole:Passager'])->group(function () {
            
           
        Route::get('/dashboard_Passager', function () {
            return view('Dashboard.Passager.index');
        })->name('dashboard_Passager');
            
        });

       
     

        Route::get('/', [SearcheController::class, 'index'])->name('index_searche');
        Route::post('/search_forrm', [SearcheController::class, 'search'])->name('search_forrm');



        
        Route::get('/dashboard_profile', function () {
            return view('Dashboard.avatar');
        })->middleware(['auth:web', 'verified'])->name('dashboard_profile');

        require __DIR__.'/auth.php';


    });
