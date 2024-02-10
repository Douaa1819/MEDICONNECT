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
    public function handle($request, Closure $next, $guard = null)
{
    if (Auth::guard($guard)->check()) {
        $user = Auth::user();

        // Redirection basée sur le rôle
        if ($user->role == 'doctor') {
            return redirect('/doctor/doashbord');
        } elseif ($user->role == 'patient') {
            return redirect('/patient/home');
        } elseif ($user->role == 'admine') {
            return redirect('/admine/profile');
        }

        return redirect('/doashbord');
    }

    return $next($request);
}}