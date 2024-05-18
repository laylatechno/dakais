<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateSiswa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('siswa')->check()) {
            return redirect()->route('area.login')->withErrors([
                'loginError' => 'Anda harus login untuk mengakses halaman ini',
            ]);
        }
    
        return $next($request);
    }
}
