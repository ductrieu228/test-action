<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
            $timezone = match (Session::get('locale')) {
                'ja' => 'Asia/Tokyo',
                'vn' => 'Asia/Ho_Chi_Minh',
                'en' => 'UTC',
                default => config('app.timezone'),
            };
            config(['app.timezone' => $timezone]);
            date_default_timezone_set($timezone);
        }
        return $next($request);
    }
}
