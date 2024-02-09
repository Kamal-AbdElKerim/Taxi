<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next){

        if (auth('web')->check()){
            return redirect(RouteServiceProvider::HOME);
        }

        // if (auth('Admin')->check()){
        //     return redirect(RouteServiceProvider::admin);
        // }

        // if (auth('doctor')->check()){
        //     return redirect(RouteServiceProvider::DOCTOR);
        // }

        // if (auth('ray_employee')->check()){
        //     return redirect(RouteServiceProvider::RayEmployee);
        // }

        // if (auth('laboratorie_employee')->check()){
        //     return redirect(RouteServiceProvider::LABORATORIEEmployee);
        // }

        // if (auth('patient')->check()){
        //     return redirect(RouteServiceProvider::PATIENT);
        // }

        return $next($request);
    }
}
