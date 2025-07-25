<?php

namespace App\Http\Middleware;

use Closure;

class HasPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request,  Closure $next, $permission)
    {
        if(auth()->user()->is_superadmin || auth()->user()->hasPermission($permission)) 
            return $next($request);
       
        abort(401);
    } 
}
