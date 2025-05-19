<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
USE Throwable;
use Illuminate\Http\Request;
use App\Traits\GeneralTraits;
use App\Models\Admin;
use App\Models\User;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenInvalidException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenExpiredException;
use PHPOpenSourceSaver\JWTAuth\Http\Middleware\BaseMiddleware;

class AssignGuard extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if($guard != null){
            auth()->shouldUse($guard);
            $token = $request->header('auth-token');
            $request->headers->set('auth-token', (string) $token, true);
            $request->headers->set('Authorization', 'Bearer '.$token, true);

            try{
                JWTAuth::parseToken()->authenticate();
            }
            catch(Exception $e){
                if($e instanceof TokenInvalidException){
                    return GeneralTraits::returnError('E3001', 'Invalid Token');
                }
                else if($e instanceof TokenExpiredException){
                    return GeneralTraits::returnError('E3002', 'Expired Token');
                }
                else{
                    return GeneralTraits::returnError('E3003', 'Token Not Found');
                }
            }

            if($guard == 'admin'){
                $authenticated = Admin::where('token', $token)->first();
                if(!$authenticated){
                    return GeneralTraits::returnError('E3001', 'Invalid Token');
                }
            }
            else{
                $authenticated = User::where('token', $token)->first();
                if(!$authenticated){
                    return GeneralTraits::returnError('E3001', 'Invalid Token');
                }
            }

            return $next($request);
        }
    }
}
