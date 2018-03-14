<?php namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

/**
 * Class Admin
 * Checks if logged in user is Administrator
 * @author Jagadeesh Battula jagadeesh@goftx.com
 *
 * @package App\Http\Middleware
 */
class Admin
{
    /**
     * Checks if user is administrator
     *
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->isAdmin()){
                return $next($request);
            }

            return redirect('/');
        }
    }
}
