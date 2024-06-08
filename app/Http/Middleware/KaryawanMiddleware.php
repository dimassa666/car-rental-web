<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class KaryawanMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // cek apakah sudah login dan role: 'karyawan'
        if (Auth::check()) {
            if (Auth::user()->role === 'karyawan') {
                return $next($request);
            }
        }
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
