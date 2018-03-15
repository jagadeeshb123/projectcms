<?php namespace App\Http\Middleware;

/**
 * Class Authenticate
 *
 * @author Jagadeesh Battula jagadeesh@goftx.com
 * @package App\Http\Middleware
 */

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle method
     *
     * @param $request
     * @param Closure $next
     * @param null $guard
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|mixed|\Symfony\Component\HttpFoundation\Response
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest())
        {

            if ($request->ajax() || $request->wantsJson())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                return redirect()->guest('login');
            }

        }

        return $next($request);
    }
}
