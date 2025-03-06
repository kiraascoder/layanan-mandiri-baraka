<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return abort(403, 'User is not authenticated');
        }

        $allowedRoles = $roles ?: ['superadmin', 'kelurahan'];

        if (!in_array(Auth::user()->role, $allowedRoles)) {
            return abort(403, 'Your role: ' . Auth::user()->role . ' is not allowed. Allowed roles: ' . implode(', ', $allowedRoles));
        }

        return $next($request);
    }
}
