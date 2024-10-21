<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role = null)
    {
        $user = Auth::user();

        // Check if the user is authenticated and has the specified role
        if ($user && ($user->role === 'admin' || $user->role === 'owner')) {
            return $next($request);
        }

        // Redirect or return an unauthorized response if access is denied
        return redirect('/motor-link')->with('error', 'You do not have access to this area.');
    }
}
