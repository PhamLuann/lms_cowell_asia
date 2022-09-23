<?php

namespace App\Http\Middleware;

use Closure;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Database\Capsule\Manager as Capsule;

class CheckRole
{

    /**
     * Xử lý yêu cầu đến.
     *
     * @param \Illuminate\Http\Request $request         
     * @param \Closure $next            
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Sentinel::check()) {
            return $next($request);
        }

        return redirect()->route('login')->withErrors('Bạn phải đăng nhập');
    }
}
