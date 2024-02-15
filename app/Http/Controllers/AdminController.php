<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Driver;
use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard(){
      
      $Passagers =  User::where('role','Passager')->withTrashed()->get();
      $drivers =  User::where('role','driver')->withTrashed()->get();
      $reservations =  reservation::all();

        return view('front.admin.Dashboard',compact('Passagers','drivers','reservations'));
    }

    public function restore_Passager($id){

       
        User::withTrashed()->where('user_id', $id)->restore();



        return redirect()->back();
    }

    public function delete_Passager($id){

        User::find($id)->delete();


        return redirect()->back();
    }

    public function delete_driver($id){

        User::find($id)->delete();


        return redirect()->back();
    }

    public function restore_driver($id){

       
        User::withTrashed()->where('user_id', $id)->restore();



        return redirect()->back();
    }


    public function form_add_passeger(){

  return view('front.admin.Add_Passager');
    }

    
    public function store_register_passager(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:' . User::class,
            'password' => 'required|confirmed',
            'image' => 'required',
            'role' => 'required|string',
        ]);

        // dd($request);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        // dd($imageName);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $imageName,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
     

        return redirect()->back()->with('success', 'Done');
    }

    public function reserv_passeger($id){

            // Read JSON file
            $json = file_get_contents(storage_path('app/cities.json'));

            // Decode JSON data
            $citys = json_decode($json);

        return view('front.admin.drivers',compact('citys','id'));

    }

    public function search_forrm_passeger(Request $request) {
        // Get input data from the request
    
        $credentials = $request->only('start_city', 'end_city');

        session(['search_results' => $credentials]);
        session(['user_id' => $request->user_id]);

   
           
            return redirect()->route('affiche_card_passeger');
   
    
    }

    public function affiche_card_passeger(Request $request) {
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

        $user_id = session('user_id');
     

    
        if ($routes->isNotEmpty()) {
            return view('front.admin.item_listing', ['results' => $routes , 'user_id' => $user_id]);
        } else {
            return redirect()->back()->with('error', 'Search results not found in session.');
        }
    }
}
