<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // $block_ips = [
        //     "128.0.0.2",
        //     "10.22.140.6"
        // ];
        // $t = $request->ip();
        if (!$request->has('age') || $request->age < 18) {
            return redirect(route('homepage'));
        }
        return $next($request);
    }
}
