<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Voter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == 'Admin') {
            return redirect()->route('admin');
        }

        if (Auth::user()->role == 'Candidate') {
            return redirect()->route('candidate');
        }

        if (Auth::user()->role == 'Voter') {
            return $next($request);
        }

        //return $next($request);
    }
}
