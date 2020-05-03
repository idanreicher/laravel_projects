<?php

namespace App\Http\Middleware;

use Closure;

class IpCheck
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
        if ($request->ip() == '127.0.0.0') {
            return $next($request);
        }

        return redirect('/');
    }

    public function terminate($req, $res){
        file_put_contents(__DIR__.'/terminate.txt', 'terminated from chechip');
    }
}
