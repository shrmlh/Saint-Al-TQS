<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Rider
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::user()->status) {
            Auth::logout();
            return redirect('login')->withErrors(['Your account is deactivated.']);
        }

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == 3) {
            return $next($request);
        }

        if (Auth::user()->role == 1 || Auth::user()->role == 2) {
            return redirect()->route('admin');
        }
    }
}
