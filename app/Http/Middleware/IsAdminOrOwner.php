<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdminOrOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (auth()->user()->role->name != "owner" && auth()->user()->role->name != "admin") {
            
            return redirect()->back()->with('fail', 'you are not an proprety owner or admin!');

         }
        return $next($request);
    
    }
}
