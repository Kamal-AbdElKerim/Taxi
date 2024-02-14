<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use App\Models\user;
use Illuminate\Http\Request;

class PassagerController extends Controller
{
    public function dashboard()  {
        return view('front.passager.myReservation');
    }

    public function Profile()  {
        $id = auth()->id();
        $user = user::where('user_id', $id)->first();

        $reservation = Reservation::select(
            'reservations.reting',
            'reservations.id AS reservations_id',
            'users.name',
            'horaires.date',
            'routes.start_city',
            'routes.end_city',
            'trips_of_drivers.*',
            'routes.start_city', // Duplicate column, you may remove one of them
            'routes.end_city',   // Duplicate column, you may remove one of them
            'reviews.driver_R_id'
        )
        ->join('horaires', 'reservations.horaire_id', '=', 'horaires.id')
        ->join('trips_of_drivers', 'trips_of_drivers.horaire_id', '=', 'horaires.id')
        ->join('drivers', 'trips_of_drivers.driver_id', '=', 'drivers.id')
        ->join('routes', 'reservations.route_id', '=', 'routes.id')
        ->join('users', 'users.user_id', '=', 'drivers.user_id')
        ->leftJoin('reviews', 'reviews.driver_R_id', '=', 'drivers.id') // Use leftJoin instead of join
        ->where('reservations.user_id', $id)
        ->groupBy('trips_of_drivers.horaire_id')
        ->get();
    
        // dd($reservation);
        return view('front.passager.myReservation',compact('reservation','user'));
    }
}
