<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin{

    public function handle(Request $request, Closure $next){

        return $next($request);

        if(Auth::user() && Auth::user()->estado=='admin'){

            return $next($request);

         }elseif (Auth::user() && Auth::user()->estado=='funcionario') {

            return $next($request);

         }else{

               return redirect('login');
         }

    }
}
