<?php

namespace App\Http\Middleware;

use App\Traits\GeneralTraits;
use Closure;
use Illuminate\Http\Request;

class CheckPassword
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
        if($request->api_password != env('API_PASSWORD')){
            return GeneralTraits::returnError('E001', 'Unauthenticated');
        }

        return $next($request);
    }
}
