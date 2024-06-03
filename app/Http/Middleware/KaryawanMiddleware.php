<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
        if ($request->user() && $request->user()->role == 'karyawan') {
            return $next($request);
        }
        return redirect('/')->withErrors('Anda tidak memiliki akses ke halaman ini.');
    }
}
