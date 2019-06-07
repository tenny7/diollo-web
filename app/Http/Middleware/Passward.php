<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Passward extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        $response = $next($request);

        // Check that there is not already a cookie set and that we have 'ref' in the url
        if (! $request->hasCookie('referral') && $request->query('ref') ) {
        // Add a cookie to the response that lasts 5 years (in minutes)
        $response->cookie( 'referral', encrypt( $request->query('ref') ), 525600 );
        }

        return $response;

        if (! $request->expectsJson()) {
            return route('signin-as-agent');
        }
    }
}
