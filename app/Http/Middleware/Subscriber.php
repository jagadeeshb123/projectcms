<?php namespace App\Http\Middleware;

/**
 * Class Subscriber
 *
 * Checks if logged in user is subscriber
 *
 * @author Jagadeesh Battula jagadeesh@goftx.com
 * @package App\Http\Middleware
 */

use Closure;
use Illuminate\Support\Facades\Auth;

class Subscriber
{
    /**
     * Checks if user is subscriber
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            if(Auth::user()->isSubscriber())
            {
                return $next($request);
            }

            return redirect('/');
        }
    }
}
