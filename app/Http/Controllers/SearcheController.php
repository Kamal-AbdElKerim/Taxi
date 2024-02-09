<?php

namespace App\Http\Controllers;

use App\Models\route;
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
        $credentials = $request->only('start_city', 'end_city');
    
        // Check if the credentials contain the required data
        if (isset($credentials['start_city']) && isset($credentials['end_city'])) { 
            // Perform search in the "horaires" table
            $results = route::where('start_city', $credentials['start_city'])
                              ->where('end_city', $credentials['end_city'])
                              ->get();
            
            session(['search_results' => $results]);

           
            return redirect()->route('affiche_card');
        } else {
          
          
            return redirect()->back()->with('error', 'Please provide both start and end cities.');
        }
    
    }

    public function affiche_card() {
       
        $routes = session('search_results');

        if ($routes) {
           
            return view('front.item_listing', ['results' => $routes]);
        } else {
          
            return redirect()->back()->with('error', 'Search results not found in session.');
        }
       
    
    }
}
