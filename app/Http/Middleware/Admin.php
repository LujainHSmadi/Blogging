<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {



            if (Auth::user()->role == 'Admin') {
                return $next($request);
            } else {
                return redirect()->route('super_admin.dashboard')->with('danger', "You don't have a permission to access this page");
            }

    }
}
