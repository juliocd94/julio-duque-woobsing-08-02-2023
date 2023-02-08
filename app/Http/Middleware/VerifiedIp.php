<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifiedIp
{
    public function handle(Request $request, Closure $next)
    {

        if(request()->ip() == '127.0.0.1' && auth()->user()->role_id == 1){
            $cookie = 'valor de la cookie';
            setcookie('origin_sesion', $cookie, time()+86400, '/', false, true);
            return $next($request);
        }
        return $next($request);
    }
}
