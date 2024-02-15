<?php

namespace App\Http\Controllers;

use App\Models\route;
use App\Models\driver;
use App\Models\horaire;
use App\Models\reservation;
use Illuminate\Http\Request;
use App\Models\trips_of_driver;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SearcheController extends Controller
{
    public function index() {

         // Read JSON file
         $json = file_get_contents(storage_path('app/cities.json'));

         // Decode JSON data
         $citys = json_decode($json);
        //  dd($citys->cities);
        $id = Auth()->id();
        if ($id) {
            $maxNbr = DB::table(DB::raw("(SELECT COUNT(*) AS nbr, horaire_id FROM reservations WHERE user_id = $id GROUP BY horaire_id) AS subquery_alias"))
            ->selectRaw('MAX(nbr) AS max_nbr, horaire_id')
            ->first();
            $reservation =  reservation::where('horaire_id',$maxNbr->horaire_id)->first();
            if (isset($reservation->route_id)) {
                $route =  route::where('id',$reservation->route_id)->first();
                // dd($route);
                return view('front.index',compact('citys','route'));
            }
          
            return view('front.index',compact('citys'));

        }
      
        
        return view('front.index',compact('citys'));


           

       
           
    }

    public function search(Request $request) {
        // Get input data from the request
    
        $credentials = $request->only('start_city', 'end_city');

        session(['search_results' => $credentials]);

   
           
            return redirect()->route('affiche_card');
   
    
    }

    public function affiche_card(Request $request) {
        $credentials = session('search_results');
    
        $query = Driver::join('routes', 'drivers.route_id', '=', 'routes.id')
            ->join('users', 'drivers.user_id', '=', 'users.user_id')
            ->join('taxis', 'taxis.driver_id', '=', 'drivers.id')
            ->join('trips_of_drivers', 'drivers.id', '=', 'trips_of_drivers.driver_id')
            ->join('horaires', 'trips_of_drivers.horaire_id', '=', 'horaires.id')
            ->leftJoin('reviews', 'reviews.driver_R_id', '=', 'drivers.id')
            ->select(
                'routes.start_city', 
                'routes.end_city', 
                'routes.id as routes_id', 
                'users.name', 
                'horaires.date', 
                'horaires.id', 
                'taxis.vehicle_type', 
                'taxis.payment_method', 
                'drivers.id AS driver_id', 
                DB::raw('SUM(reviews.rating) AS num_reviews'), 
                DB::raw('COUNT(reviews.driver_R_id) AS All_reviews')
            )
            ->where('routes.start_city', $credentials['start_city'])
            ->where('routes.end_city', $credentials['end_city'])
            ->where('trips_of_drivers.num_reserv', '<=', 4)
            ->groupBy('routes.start_city', 'routes.end_city', 'routes.id', 'users.name', 'horaires.date', 'horaires.id', 'drivers.id');
    
        // Check if sorting is requested
        if ($request->has('sort') && $request->sort == 'desc') {
            $query->orderByDesc('num_reviews');
        }

           // Filter by vehicle type if selected
           if ($request->filled('vehicle_type') && $request->vehicle_type != 'all') {
            $query->where('taxis.vehicle_type', $request->vehicle_type);
        }

        
    
        $routes = $query->get();

        // dd($routes);
    
    
            return view('front.item_listing', ['results' => $routes]);
     
    }
}
