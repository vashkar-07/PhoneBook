<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuth
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
        if($request->path() == 'login' && $request->session()->has('user')){
            return redirect('admin');
        }
        elseif($request->path() == 'login' && $request->session()->has('staff')){
            if($request->session('staff.applied') == false){
            return redirect('application');
            }
            elseif($request->session('staff.veified') == true){
                return redirect('userFirstPage');
            }
        }
        return $next($request);
    }
}
