<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {

        if (Auth::check()) {
            if (Auth::user()->role === $role) {
                return $next($request);
            }

            // Handle different roles with specific error messages
            $roleMessages = [
                '1' => 'Users cannot access this route',
                '2' => 'Teachers cannot access this route',
                '3' => 'Admins cannot access this route',
            ];

            $userRole = Auth::user()->role;

            if (isset($roleMessages[$userRole])) {
                return redirect()->route('login')->with('error', $roleMessages[$userRole]);
            }
        }

        return redirect()->route('login')->with('error', 'Unauthorized access');
    }
}
