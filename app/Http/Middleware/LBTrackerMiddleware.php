<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\LBT_request;

class LBTrackerMiddleware
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
        $r = LBT_request::save_request($request);

        $response = $next($request);

        $r->response_html = $response->content();
        $r->response_code = $response->status();
        $r->save();

        return $response;
    }
}
