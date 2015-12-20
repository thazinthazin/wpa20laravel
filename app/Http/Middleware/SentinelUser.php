<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class SentinelUser
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
        // Check User Must Login
        if(!Sentinel::check())
        {           
           return redirect()->route('customer_login')->with('error_message', 'Sorry You Are Not Member. Please Login With Your Account');
          // Check Login User Is Must Sure User 
        } else {

            $user = Sentinel::getUser();
            $role = Sentinel::findRoleByName('Users');

            if (!$user->inRole($role)) {
                return redirect()->route('customer_login')->with('error_message', 'Sorry You Are Not Member. Please Login With Your Account');
            }

        } 
        
        return $next($request);
    }
}
