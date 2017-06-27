<?php

namespace App\Http\Middleware;

use Closure;

class UserRoleChecker
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
        $role = \Auth::user()->role;
        if ($role === 'user') {
            return $next($request);
        } elseif ($role == 'admin') {
            return redirect('/adminhome');
        } elseif ($role == 'client') {
            return redirect('/clienthome');
        }

        return redirect('/');
    }
}
