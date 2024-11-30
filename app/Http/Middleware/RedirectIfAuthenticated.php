<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $role = Auth::user()->role->role;

                switch ($role) {
                    case 'admin':
                        return redirect()->intended('/admin/dashboard');
                    case 'teacher':
                        return redirect()->intended('/teacher/dashboard');
                    case 'employee':
                        return redirect()->intended('/employee/dashboard');
                    case 'principal':
                        return redirect()->intended('/principal/dashboard');
                    case 'foundation':
                        return redirect()->intended('/foundation/dashboard');
                    case 'inspector':
                        return redirect()->intended('/inspector/dashboard');
                    default:
                        abort(403, 'Role not recognized.');
                }
            }
        }

        return $next($request);
    }
}
