<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LastLogin
{
    public function handle(Request $request, Closure $next)
    {
        $last_login = auth()->user()->last_login;
        $today = now();
        $difSeconds = strtotime($today) -  strtotime($last_login);
        $difHours = $difSeconds / 3600;

        if($difHours > 24){
            return redirect()->route('sesiones');
       }
        return $next($request);
    }
}
