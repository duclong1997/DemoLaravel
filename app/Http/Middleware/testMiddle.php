<?php

namespace App\Http\Middleware;

use Closure;

class testMiddle
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
        
        // pass middleware
        return $next($request);
    }
}
