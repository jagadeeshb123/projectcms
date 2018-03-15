<?php namespace App\Http\Middleware;

/**
 * Class VerifyCsrfToken
 *
 * @author Jagadeesh Battula jagadeesh@goftx.com
 * @package App\Http\Middleware
 */

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
