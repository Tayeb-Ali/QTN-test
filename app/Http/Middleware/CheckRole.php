<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()) {
            $role = Auth::user()->role()->first('name')->name;
            if ($role == 'supervisors' || $role == 'admin') {
                return $next($request);
            } else {
                return redirect('404');
            }
        } else {
            return redirect('/');
        }
    }
}
