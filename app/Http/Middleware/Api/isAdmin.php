<?php

namespace App\Http\Middleware\Api;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdmin
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
      //  return $next($request);
        if (Auth::user()->isadmin==1) return $next($request);

        return response([
            'data'=>'دسترسی به این صفحه فقط برای مدیر مجاز است',
            'status'=>'error'
        ]);
    }
}
