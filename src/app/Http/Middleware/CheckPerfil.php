<?php

namespace App\Http\Middleware;

use Closure;

class CheckPerfil
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
        if($request->user()->perfil->id == $request->route('perfile')){
            return $next($request);
        }
        abort(401);
    }
}
