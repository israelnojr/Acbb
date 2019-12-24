<?php

namespace App\Http\Middleware;

use Closure;
use Cache;
use Carbon\Carbon;
use Auth;

class UserOnlineStatus
{
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            $expiredAt = Carbon::now()->addMinutes(1);
            Cache::put('user-is-onlin-' . Auth::user()->id, true, $expiredAt);
        }
        return $next($request);
    }
}
