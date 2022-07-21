<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        
        if ($role == 'admin' && auth()->user()->role != 'admin' ) {


            return redirect()->route('redirect');
            abort(403);
            return redirect()->route('redirect');
        }
        if ($role == 'user' && auth()->user()->role != 'user' ) {
            return redirect()->route('redirect');
            abort(403);
            return redirect()->route('redirect');
        }
        if ($role == 'emt' && auth()->user()->role != 'emt' ) {
            return redirect()->route('redirect');
            abort(403);

        }

        return $next($request);
    }
}
