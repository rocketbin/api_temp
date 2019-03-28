<?php

namespace App\Http\Middleware;

use App\Services\hpService;
use Closure;

class systemcore
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
        if( hpService::GetConfig('status') !== 'configurable' ){
            return response()->json('the system is not on cofiguration mode!', 405);
        }
        return $next($request);

    }
}
