<?php namespace App\Http\Middleware;

/**
 * Class Author
 *
 * Checks if logged in user is author
 *
 * @author Jagadeesh Battula jagadeesh@goftx.com
 * @package App\Http\Middleware
 */

use Closure;
use Illuminate\Support\Facades\Auth;

class Author
{
    /**
     * Checks if author is present
     *
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next)
    {

        if(Auth::check())
        {

            if(Auth::user()->isAuthor())
            {
                return $next($request);
            }

            return redirect('/');
        }

    }
}
