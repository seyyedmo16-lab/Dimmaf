<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLanguageCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        
        // If there's a lang parameter in the request, set the cookie
        if ($request->has('lang')) {
            $lang = $request->get('lang');
            if(in_array($lang, ['fa', 'en'])) {
                $response->headers->setCookie(cookie('lang', $lang, 60 * 24 * 365));
            }
        }
        
        return $response;
    }
}

