<?php

namespace App\Http\Middleware;

use Closure;

class role
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
        if($request->user()===null){
            return abort(403,'Эрх хүрэлцэхгүй байна.'); 
        }
        $actions = $request -> route() -> getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null;
        if($request->user()->hasAnyRole($roles) || !$roles ){
            return $next($request);
        }
        return abort(403,'Эрх хүрэлцэхгүй байна.');
    }
}
