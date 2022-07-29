<?php


namespace App\Http\Middleware;


use Closure;


class MyBrandSession
{
    public function handle($request, Closure $next)
    {
        if (!$request->session()->exists('selected_brand')) {
            // user value cannot be found in session
            return redirect('admin/home');
        }

        return $next($request);
    }


}
