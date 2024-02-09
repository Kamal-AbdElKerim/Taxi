<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

use function PHPUnit\Framework\isTrue;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('front.login');
    }

    public function store_register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:' . User::class,
            'password' => 'required|confirmed',
            'image' => 'required',
            'role' => 'required|string',
        ]);
        
// dd($request);
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        // dd($imageName);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $imageName, 
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);


    

       return redirect()->route('login');

    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'admin') {
                session()->flash('login_success');
                return redirect()->intended('/dashboard_admin');
            } elseif ($user->role === 'driver') {
                session()->flash('login_success');
                return redirect()->intended('/home_driver');
            } elseif ($user->role === 'Passager') {
                session()->flash('login_success');
                return redirect()->intended('/dashboard_Passager');
            }

            // // Handle other roles or fallback to a default redirect
            // return redirect()->intended(RouteServiceProvider::HOME);
        }

        return back()->withErrors([
            'email' => trans("Dashboard/messages.verifi_email")
        ])->withInput();
    }

 
  

    public function destroy(Request $request ): RedirectResponse
    {
        return $this->logout($request, 'web');
    }

    public function destroyAdmin(Request $request): RedirectResponse
    {
        return $this->logout($request, 'Admin');
    }

    protected function logout(Request $request, $guard): RedirectResponse
    {

        Auth::guard($guard)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }


   
    
}
