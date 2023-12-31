<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){
            return redirect('/login');
        }
        $user=Auth::user();
        if($user->role == 1){
            return $next($request);
        }
        if($user->role == 2){
            return redirect('/inicio_alumnos');
        }
        if($user->role == 3){
            return redirect('/inicio_empresa');
        }
        if($user->role == 4){
            return redirect('/inicio_asesor-academico');
        }
    }
}
