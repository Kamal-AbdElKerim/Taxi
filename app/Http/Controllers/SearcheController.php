<?php

namespace App\Http\Controllers;

use App\Models\route;
use App\Models\driver;
use App\Models\horaire;
use App\Models\reservation;
use App\Models\trips_of_driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearcheController extends Controller
{
    public function index() {

         // Read JSON file
         $json = file_get_contents(storage_path('app/cities.json'));

         // Decode JSON data
         $citys = json_decode($json);
        //  dd($citys->cities);
        
        return view('front.index',compact('citys'));
    }

    public function search(Request $request) {
        // Get input data from the request
    
        $credentials = $request->only('start_city', 'end_city');

        session(['search_results' => $credentials]);

   
           
            return redirect()->route('affiche_card');
   
    
    }

    public function affiche_card() {
       
        $credentials = session('search_results');

        $routes = Driver::join('routes', 'drivers.route_id', '=', 'routes.id')
        ->join('users', 'drivers.user_id', '=', 'users.user_id')
        ->join('trips_of_drivers', 'drivers.id', '=', 'trips_of_drivers.driver_id')
        ->join('horaires', 'trips_of_drivers.horaire_id', '=', 'horaires.id')
        ->select('routes.start_city', 'routes.end_city','routes.id as routes_id', 'users.name', 'horaires.date', 'horaires.id', 'users.user_id')
        ->where('routes.start_city', $credentials['start_city'])
        ->where('routes.end_city', $credentials['end_city'])
        ->where('trips_of_drivers.num_reserv', '<=', 4)
        ->get();

        // dd($routes);
   

        if ($routes) {
           
            return view('front.item_listing', ['results' => $routes]);
        } else {
          
            return redirect()->back()->with('error', 'Search results not found in session.');
        }
       
    
    }
}
