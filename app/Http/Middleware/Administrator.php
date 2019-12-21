<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


class Administrator
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
        if(Auth::check()){
            if(intval(Auth::user()->who) === 4){
                $data = array();
                $data['seen_last'] = time();
                Auth::user()->update($data);
                View::share('alerts', Auth::user()->alerts());
                return $next($request);
            }else{
                Auth::logout();
                return redirect(route('admin.login'))->withErrors(array('access' => 'Invalid credentials given'));
            }
        }else{
            Auth::logout();
            return redirect(route('admin.login'))->withErrors(array('access' => 'Invalid credentials given'));
        } // check if user is authenticated
    }
}
