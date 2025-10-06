<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Set default language if not set
        if (!session()->has('lang')) {
            session()->put('lang', 'en');
        }
        
        // Debug: Log current language
        \Log::info('Current language in middleware: ' . session('lang'));
        
        return $next($request);
    }
}
