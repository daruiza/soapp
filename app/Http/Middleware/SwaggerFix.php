<?php

namespace App\Http\Middleware;

use Closure;

class SwaggerFix
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
        $request->headers->set("Content-Type", "application/json");
        $request->headers->set("Accept", "application/json");        
        // $request->headers->set("Connection", "keep-alive");   

        if (strpos($request->headers->get("Authorization"), "Bearer ") === false) {
            $request->headers->set("Authorization", "Bearer " . $request->headers->get("Authorization"));
        }

        $response = $next($request);

        return $response;
    }
}
