<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if(!Auth::check()){
            return redirect('login')->with('warning',"kamu ga punya akses");;
        }
        $user = Auth::user();

        //agar level bisa lebih dari satu yang dapat dimasukkan pada 1 route group
        if (in_array($user->level,$roles)) {
            return $next($request);
        }
        // if (auth()->guest() || !auth()->user()->is_admin) {
        //     abort(403);
        // }
        
    }
}