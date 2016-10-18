<?php

namespace App\Http\Middleware;

use Closure;

class Cros
{
    protected static $domains = [
        'http://localhost:8080'
    ];

    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (isset($request->server()['HTTP_ORIGIN'])) {
            $origin = $request->server()['HTTP_ORIGIN'];
            if (in_array($origin, self::$domains)) {
                return $response->header('Access-Control-Allow-Origin', $origin)
                    ->header('Access-Control-Allow-Credentials', 'true')
                    ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
                    ->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With')
                    ->header('Access-Control-Max-Age', '28800');
            }
        }

        return $response;
    }
}
