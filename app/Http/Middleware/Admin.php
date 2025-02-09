<?php


namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle(Request $request, Closure $next, $roles)
    {
        $allowedRoles = explode('|', $roles); // Bisa menerima multiple roles

        if (!Auth::check() || !in_array(Auth::user()->role, $allowedRoles)) {
            return abort(403, 'You are not authorized to access this resource');
        }

        return $next($request);
    }
}
