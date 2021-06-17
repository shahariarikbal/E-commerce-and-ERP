<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AdminMiddleware
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
        if (Session::get('id') && Session::get('role') ) {
            return $next($request);
        }else {
            return redirect('/admin/login')->with('error', 'Invalid User Login');
        }
    }
}
