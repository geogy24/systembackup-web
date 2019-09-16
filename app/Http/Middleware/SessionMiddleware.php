<?php

namespace App\Http\Middleware;

use App\Facades\SessionFacade;

use Closure;

class SessionMiddleware
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
        $selectedLink = null;

        switch($request->getRequestUri()) {
            case '/help':
                $selectedLink = 'ayuda';
                break;
            case '/users':
                $selectedLink = 'usuarios';
                break;
            case '/backups':
                $selectedLink = 'copias';
                break;
            default:
                $selectedLink = null;
                break;
        }

        SessionFacade::selectedLink($selectedLink);

        return $next($request);
    }
}
