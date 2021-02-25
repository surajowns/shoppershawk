<?php

namespace App\Http\Middleware;

use Closure;

class UserSession
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
        if($request->session()->get('logid') === null ){
            return redirect('/login');
        }
        return $next($request);
    }
 }
