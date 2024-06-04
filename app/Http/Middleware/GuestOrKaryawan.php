<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class GuestOrKaryawan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // cek apakah user adalah guest atau memiliki role 'karyawan' untuk register
        if (Auth::guest() || (Auth::check() && Auth::user()->role == 'karyawan')) {
            return $next($request);
        }
        return redirect('/')->withErrors('Anda tidak memiliki akses ke halaman ini.');
    }
}
