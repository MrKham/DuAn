<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class BlackList
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()){
            $check = \App\Models\BlackList::where('email', Auth::user()->email)->first();
            if ($check != null) {
                Auth::logout();
                return redirect(url('/errors/503'));
            }
        }

        return $next($request);
    }
}
