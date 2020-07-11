<?php

namespace App\Http\Middleware;
use Log;
use Closure;
use Illuminate\Http\Request;

class OutsideBlock
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {
        $id = $request->session()->get('userId');

        if ($id >= 1 && $id <= 6) {
            return $next($request);
        } else {
            return redirect('/welcome');
        }
    }

}
