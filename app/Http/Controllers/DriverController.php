<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\route;
use App\Models\driver;
use App\Models\taxi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    public function index()
    {
        $routes = route::all();
            return view("front.driver.profile_data",compact('routes'));
     
    }

    public function add_route($id)
    {
      $route =   route::find($id);
        dd($route);

        return view("front.driver.profile_data");
     
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
