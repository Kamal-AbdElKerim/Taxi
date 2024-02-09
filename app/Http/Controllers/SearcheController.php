<?php

namespace App\Http\Controllers;

use App\Models\route;
use App\Models\driver;
use App\Models\horaire;
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
    
        // // Check if the credentials contain the required data
        // if (isset($credentials['start_city']) && isset($credentials['end_city'])) { 
        //     // Perform search in the "horaires" table
        //     $results = route::where('start_city', $credentials['start_city'])
        //                       ->where('end_city', $credentials['end_city'])
        //                       ->get();
        $credentials = $request->only('start_city', 'end_city');

        $results = Driver::join('routes', 'drivers.route_id', '=', 'routes.id')
            ->join('users', 'drivers.user_id', '=', 'users.id')
            ->join('trips_of_drivers', 'drivers.id', '=', 'trips_of_drivers.driver_id')
            ->join('horaires', 'trips_of_drivers.horaire_id', '=', 'horaires.id')
            ->select('routes.*', 'users.name','horaires.date')
            ->where('routes.start_city', $credentials['start_city'])
            ->where('routes.end_city', $credentials['end_city'])
          
            ->get();
    
        
            session(['search_results' => $results]);


           
            return redirect()->route('affiche_card');
   
    
    }

    public function affiche_card() {
       
        $routes = session('search_results');

    // dd($routes);

        if ($routes) {
           
            return view('front.item_listing', ['results' => $routes]);
        } else {
          
            return redirect()->back()->with('error', 'Search results not found in session.');
        }
       
    
    }
}
