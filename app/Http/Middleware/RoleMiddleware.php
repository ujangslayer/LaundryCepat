<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Jika user belum login, lempar ke halaman login
        if (!Auth::check()) {
            return redirect('login');
        }

        // Jika role user tidak sama dengan role yang diizinkan, lempar ke halaman 403 (Forbidden)
        if (Auth::user()->role !== $role) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}