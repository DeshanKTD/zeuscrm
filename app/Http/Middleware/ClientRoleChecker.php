<?php

namespace App\Http\Middleware;

use Closure;

class ClientRoleChecker
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
        $role =  \Auth::user()->role;
        if($role==='client'){
            return $next($request);
        }
        elseif($role=='user'){
            return redirect()->route('userhome');
        }
        elseif($role=='client'){
            return redirect()->route('adminhome');
        }

        return redirect()->route('/');
    }
}
