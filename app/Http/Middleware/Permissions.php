<?php

namespace App\Http\Middleware;

use Closure;

class Permissions
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
        // Verifica se está logado, se não tiver redireciona
        if ( !auth()->check() )
        return redirect()->route('login');

        /*
        * Verifica se o e-mail é Gmail
        */
        // Recupera o e-mail do usuário logado
        $permission = auth()->user()->permission;

        

        // Verifica se é gmail.com, caso não se redireciona para a Home Page
        if ( $permission != 'ADM' )
        {
            return redirect('/');
        }
            


        // Permite que continue (Caso não entre em nenhum dos if acima)...
        return $next($request);
    }
}
