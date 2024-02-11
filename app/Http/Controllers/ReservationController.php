<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use App\Models\trips_of_driver;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function add_reservation(Request $request)  {
        
    //  dd($request);
    $driver = trips_of_driver::where('horaire_id', $request->horaire_id)->first();

    if ($driver->num_reserv == 5) {
        return redirect()->back();

    }
     reservation::create([
        'user_id' => auth()->id() ,
        'horaire_id' => $request->horaire_id ,
        'driver_id' =>  $request->driver_id  ,
      
     ]);

     $reservationCount = Reservation::where('horaire_id', $request->horaire_id)->count();

   

     if (!$reservationCount) {
       $reservationCount = 1 ;
     }
  
  

     if ($driver) {
        $driver->update([
            'num_reserv' => $reservationCount,
        ]);
      }
//    dd($driver);
     return redirect()->back();


    }
 
}
