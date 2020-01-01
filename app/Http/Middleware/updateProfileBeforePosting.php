<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class updateProfileBeforePosting
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
        if ($user = $request->user()) {
            if(!$user->profile->town){
                return redirect()->route('user.profile.edit', Auth::user()->profile->id)
                ->with('warning', 'Update Your Profie to be able to make a post'); 
            }
        }
        return $next($request);
    }

}
