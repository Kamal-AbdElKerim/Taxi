<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use Illuminate\Http\Request;

class PassagerController extends Controller
{
    public function dashboard()  {
        return view('front.passager.myReservation');
    }

    public function Profile()  {
        $id =auth()->id();
    //  $reservation =   reservation::where('user_id',$id)->get();

     $reservation = reservation::join('drivers', 'reservations.driver_id', '=', 'drivers.user_id')
    //  ->join()
     ->join('users', 'users.user_id', '=', 'drivers.user_id')
     ->join('routes', 'drivers.route_id', '=', 'routes.id')
      ->join('horaires', 'reservations.horaire_id', '=', 'horaires.id')
      ->join('trips_of_drivers', 'trips_of_drivers.horaire_id', '=', 'horaires.id')
   ->select('reservations.cancelled','reservations.id', 'users.name','horaires.date','routes.start_city','routes.end_city','trips_of_drivers.*')
     ->where('reservations.user_id',$id)
   
     ->get();
    //   dd($reservation);
        return view('front.passager.myReservation',compact('reservation'));
    }
}
