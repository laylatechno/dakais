<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Periksa apakah pengguna telah terautentikasi
        if (Auth::check()) {
            // Jika pengguna terautentikasi, periksa peran pengguna
            if (in_array(Auth::user()->role, $roles)) {
                return $next($request);
            }
        }

        // Jika pengguna tidak terautentikasi atau tidak memiliki peran yang sesuai, arahkan ke /dashboard
        return redirect('/dashboard');
    }
}
