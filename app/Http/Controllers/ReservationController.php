<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use App\Models\trips_of_driver;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function add_reservation(Request $request)  {
        
     
    $driver = trips_of_driver::where('horaire_id', $request->horaire_id)->first();

    if ($driver->num_reserv == 5) {
        return redirect()->back();

    }
    // dd($request->routes_id);
     reservation::create([
        'user_id' => auth()->id() ,
        'horaire_id' => $request->horaire_id ,
        'driver_id' =>  $request->driver_id  ,
        'route_id' =>  $request->routes_id  ,
      
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
       return redirect()->back()->with('success', 'Reservation has been successful.');


    }

    public function delete_reserv($horaire_id){

      $Reservation = Reservation::where('horaire_id', $horaire_id)->first();
      // dd($Reservation);
      $Reservation->delete();
      $driver = trips_of_driver::where('horaire_id', $horaire_id)->first();
      $numReserv = $driver->num_reserv - 1;
      $numReserv = max(0, $numReserv);


      if ($driver) {
        $driver->update([
            'num_reserv' => $numReserv,
        ]);
      }

      return redirect()->back()->with('success', 'Reservation has been successful.');




    }
 
}
