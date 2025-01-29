<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!Auth::check()) {
            return redirect('/login')->withErrors(['error' => 'Silakan login terlebih dahulu.']);
        }
        if (!Auth::user()->is_admin) {
            return redirect('/admin/login')->withErrors(['error' => 'Akses ditolak. Anda tidak memiliki izin untuk mengakses halaman ini.']);
        }
        return $next($request);
    }
}
