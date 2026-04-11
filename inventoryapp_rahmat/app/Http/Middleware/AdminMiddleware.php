<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // 🔥 WAJIB TAMBAH INI

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses hanya untuk admin');
        }

        return $next($request);
    }
}