<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;
class Accesscontrol
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
        if(Auth::check()){
            if(Auth::user()->status =='moderator' || Auth::user()->status =='superadmin' || Auth::user()->status =='AppAdmin' ){
                return $next($request);
            }else{
                return redirect(route('errorroute'));
            }
        }else{
            return redirect()->route('login');
        }
       
    }
}
