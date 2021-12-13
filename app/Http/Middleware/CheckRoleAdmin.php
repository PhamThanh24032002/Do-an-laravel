<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRoleAdmin
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
        // dd(Auth::guard('admin')->user()->role);
        if(Auth::guard('admin')->user()->role == 0){
            return $next($request);
        }else{
            return redirect()->back()->with('error','bạn không có quyền thực hiện chức năng này');
        }
    }
}
