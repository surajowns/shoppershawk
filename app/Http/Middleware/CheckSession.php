<?php

namespace App\Http\Middleware;

use Closure;

class CheckSession  
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
        // dd($request->session()->get('logid'));
        if($request->session()->get('logid') === null){
            return redirect('/admin/login');
        }
        return $next($request);
    }
}
