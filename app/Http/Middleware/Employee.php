<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Employee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->role == 3)
        {
           return $next($request);

        }
        elseif(auth()->user()->role == 1)
         {
            return redirect()->route('admin.dashboard');
         }
         elseif(auth()->user()->role == 2)
         {
            return redirect()->route('manager.dashboard');
         }
    }
}
