<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class CekLogin
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
        if(!session()->has('access_token')){	
			return redirect('login');
		}
		
        //return redirect('login')->with('message','Email atau password salah');
        
		
        return $next($request);
    }

  

    

}
