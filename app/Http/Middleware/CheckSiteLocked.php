<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Storage;

class CheckSiteLocked
{
    public function handle($request, Closure $next)
    {
        $path = storage_path('app/lock_status.txt');
        $locked = file_exists($path) ? trim(file_get_contents($path)) : '0';

        if ($locked === '1') {
            return response()->view('locked');
        }

        return $next($request);
    }
}
