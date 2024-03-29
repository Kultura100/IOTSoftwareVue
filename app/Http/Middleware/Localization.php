<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Localization
{
    public function handle(Request $request, Closure $next)
    {
        if(session()->has('selected_language'))
        {
        App::setLocale(session()->get('selected_language'));
        }
        return $next($request);
    }
}
