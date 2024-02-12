<?php

namespace App\Http\Controllers;

use App\Models\taxi;
use App\Models\User;
use App\Models\route;
use App\Models\driver;
use App\Models\horaire;
use App\Models\reservation;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\trips_of_driver;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    public function index()
    {
             // Read JSON file
            //  $json = file_get_contents(storage_path('app/cities.json'));

            //  // Decode JSON data
            //  $citys = json_decode($json);

        $route = route::all();
           
              $id =Auth()->id();
             $horaires = driver::join('routes', 'drivers.route_id', '=', 'routes.id')
          
              ->join('trips_of_drivers', 'trips_of_drivers.driver_id', '=', 'drivers.id')
              ->join('taxis', 'drivers.id', '=', 'taxis.driver_id')
            //    ->join('horaires', 'reservations.horaire_id', '=', 'horaires.id')
               ->select('drivers.*','routes.*','trips_of_drivers.*','taxis.*')
               ->where('drivers.user_id',$id)
            
              ->get();

            //    dd($horaires);

           
            return view("front.driver.profile_data",compact('route','horaires'));
     
    }

    public function add_route(Request $request)
    {
        // dd($request);

   

        $horaire =  horaire::create([
            'date' => $request->date
        ]);


     

      
     
        $lastInsertedhoraire = $horaire->id;

      
      $id = auth()->id();
      $driver = Driver::where('user_id', $id)->first();
  
     
      
      $driver->update([
          'route_id' =>  $request->id
        
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
    
  
     public function start_travle($horaire_id){

        $driver = trips_of_driver::where('horaire_id', $horaire_id)->first();

      if ($driver) {
        $driver->update([
            'start_time' => Carbon::now(),
        ]);
      }
      $id =Auth()->id() ;
      $driv = driver::where('user_id',$id )->first();
      $taxi = taxi::where('driver_id',$driv->id )->first();

      
      
      if ($taxi) {
        $taxi->update([
            'status' => 'En route',
        ]);
      }

      return redirect()->back();

          
     }

     public function end_travle($horaire_id){

        $driver = trips_of_driver::where('horaire_id', $horaire_id)->first();

      if ($driver) {
        $driver->update([
            'end_time' => Carbon::now(),
        ]);
      }
      $id =Auth()->id() ;
      $driv = driver::where('user_id',$id )->first();
      $taxi = taxi::where('driver_id',$driv->id )->first();

      
      
      if ($taxi) {
        $taxi->update([
            'status' => 'Available',
        ]);
      }

      return redirect()->back();

          
     }
}
