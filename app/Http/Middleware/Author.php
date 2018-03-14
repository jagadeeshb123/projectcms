<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Author
{
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->isAuthor()){
                return $next($request);
            }

            return redirect('/');
        }
    }
}
