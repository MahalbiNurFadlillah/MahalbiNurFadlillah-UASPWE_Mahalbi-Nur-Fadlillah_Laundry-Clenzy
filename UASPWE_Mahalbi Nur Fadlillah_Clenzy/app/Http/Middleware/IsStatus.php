<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$status): Response
    {
        if(in_array($request->user()->status,$status)){
            return $next($request);
        }else{
            return redirect('login')->with('failedL','Anda Tidak punya Acces !');
        }
        
    }
}
