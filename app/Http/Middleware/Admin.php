<?php
namespace App\Http\Middleware;
use Closure;
use Auth; //required to check user auth

class Admin
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
        if (Auth::check() && Auth::user()->admin) {
            //return '/admin';
            return $next($request);
        }
        return Redirect()->back();
    }
}