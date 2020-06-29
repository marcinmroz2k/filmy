<?php

namespace App\Http\Middleware;

use Closure;

class MovieMiddleware
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

        $request->validate([
            'tytul'                         => 'required|unique:movies|max:64',
            'gatunek'                       => 'required|max:32',
            'opis'                          => 'required|max:5000',
            'kraj_produkcji'                => 'required|max:64',
            'okladka'                       => 'required|unique:movies',
        ]);

        return $next($request);
        
    }
}
