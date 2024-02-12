<?php

namespace App\Http\Controllers;

use App\Models\reviews;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function add_rating(Request $request , $id){

          

            reviews::create([
                'reservation_id' => $id ,
                'rating' => $request->rating ,
                'comment' =>  $request->comment  ,
               
              
             ]);
             


    }
}
