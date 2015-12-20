<?php

namespace App\Http\Middleware;

use Closure;

class SentinelStandardUser
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
        $user = Sentinel::getUser();
        $role = Sentinel::findRoleByName('Users');

        if (!$user->inRole($users)) {
            return redirect()->route('customer_login');
        }

        return $next($request);
    }
}
