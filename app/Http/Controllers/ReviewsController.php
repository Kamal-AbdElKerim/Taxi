<?php

namespace App\Http\Controllers;

use App\Models\reviews;
use App\Models\reservation;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function add_rating(Request $request , $id){

        $reservation = reservation::where('id', $request->reservations_id)->first();

         $id = Auth()->id();

         
     if ($reservation) {
        $reservation->update([
            'reting' => 1,
        ]);
      }
      
            reviews::create([
                'driver_R_id' => $request->driver_id ,
                'passager_id' => $id ,
                'rating' => $request->rating ,
                'comment' =>  $request->comment  ,
             ]);
             
          return redirect()->back();

    }
}
