<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIfUserIsLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            // Ako korisnik nije prijavljen, preusmerite ga na stranicu za prijavljivanje
            return redirect()->route('login')->with('message', 'Morate biti prijavljeni da biste dodali proizvod u korpu.');
        }

        return $next($request);
    }
}
