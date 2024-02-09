<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\route;
use App\Models\driver;
use App\Models\horaire;
use App\Models\trips_of_driver;
use App\Models\taxi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    public function index()
    {
             // Read JSON file
             $json = file_get_contents(storage_path('app/cities.json'));

             // Decode JSON data
             $citys = json_decode($json);
           
            return view("front.driver.profile_data",compact('citys'));
     
    }

    public function add_route(Request $request)
    {
        // dd($request);

        $route = Route::create([
            'start_city' => $request->start_city,
            'end_city' => $request->end_city
        ]);

        $horaire =  horaire::create([
            'date' => $request->date
        ]);


     

      
        $lastInsertedRouteId = $route->id;
        $lastInsertedhoraire = $horaire->id;

      
      $id = auth()->id();
      $driver = Driver::where('user_id', $id)->first();
  
     
      
      $driver->update([
          'route_id' =>  $lastInsertedRouteId
        
      ]);

      trips_of_driver::create([
        'driver_id' => $driver->id,
        'horaire_id' => $lastInsertedhoraire,
       
    ]);
      return redirect()->back();

     
    }

    public function profile() {
        $id = auth()->id();
        $driver = Driver::where('user_id', $id)->first();
    
        if (!$driver) {

            $newDriver = Driver::create([
                'user_id' => $id
            ]);
    
            return view('front.driver.profile_edit');
        }
        
        $profile = $driver->taxi;
       
        
        return view('front.driver.profile_edit', compact('profile'));
    }
    
    

    public function Store_profile(Request $request) {
        // Validation rules
        $validatedData = $request->validate([
            'description' => 'required|string',
            'plate_number' => 'required|string',
            'status' => 'required|string',
            'vehicle_type' => 'required|string',
            'payment_method' => 'required|string'
        ]);
    
        $id = auth()->id();
    
        $existingDriver = driver::where('user_id', $id)->first();
    
        if ($existingDriver) {
            $existingTaxi = taxi::where('driver_id', $existingDriver->id)->first();
    
            if ($existingTaxi) {
                $existingTaxi->update($validatedData);
            } else {
                $existingDriver->taxi()->create($validatedData);
            }
        } else {
            $newDriver = driver::create([
                'user_id' => $id
            ]);
    
            $newDriver->taxi()->create($validatedData);
        }
    
        return redirect()->back();

    }
    

}
