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
              $user = user::where('user_id', $id)->first();

             $horaires = driver::join('routes', 'drivers.route_id', '=', 'routes.id')
          
            ->join('trips_of_drivers', 'trips_of_drivers.driver_id', '=', 'drivers.id')
              ->join('taxis', 'drivers.id', '=', 'taxis.driver_id')
            //    ->join('horaires', 'reservations.horaire_id', '=', 'horaires.id')
               ->select('drivers.*','routes.*','taxis.*','trips_of_drivers.*')
               ->where('drivers.user_id',$id)
               ->where('trips_of_drivers.end_time',null)
            
              ->get();

              $reservations = Reservation::join('drivers', 'reservations.driver_id', '=', 'drivers.id')
                  ->join('users', 'drivers.user_id', '=', 'users.user_id')
                  ->join('routes', 'routes.id', '=', 'reservations.route_id')
                  ->join('trips_of_drivers', 'drivers.id', '=', 'trips_of_drivers.driver_id')
                  ->join('horaires', 'horaires.id', '=', 'trips_of_drivers.horaire_id')
                  ->select('reservations.*','routes.start_city','routes.end_city')
                  ->where('users.user_id', $id)
                  ->where('trips_of_drivers.num_reserv', 5)
                  ->groupBy('reservations.horaire_id')
                  ->orderByDesc('reservations.created_at')
                  ->get();
              
            //  dd($reservations);
       

           
            return view("front.driver.profile_data",compact('route','horaires','user','reservations'));
     
    }

    public function add_route(Request $request)
    {

   

        $horaire =  horaire::create([
            'date' => $request->date
        ]);


     

      
     
        $lastInsertedhoraire = $horaire->id;

      
      $id = auth()->id();
      $driver = Driver::where('user_id', $id)->first();
  
    //   dd($driver);

      
      $driver->update([
          'route_id' =>  $request->id
        
      ]);

      trips_of_driver::create([
        'driver_id' => $driver->id,
        'horaire_id' => $lastInsertedhoraire,
        // 'start_time' => null,
        // 'end_time' => null,
       
    ]);
      return redirect()->back();

     
    }

    public function profile() {
        $id = auth()->id();
        $driver = Driver::where('user_id', $id)->first();
        $user = user::where('user_id', $id)->first();
        if (!$driver) {
            // dd($id);

            $newDriver = Driver::create([
                'user_id' => $id
            ]);
    
            return view('front.driver.profile_edit');
        }
        
        $profile = $driver->taxi;
      
        // dd($user);
        return view('front.driver.profile_edit', compact('profile','user'));
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
