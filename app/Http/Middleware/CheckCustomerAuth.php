<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckCustomerAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // Pelanggan terotentikasi, simpan nama pelanggan dalam sesi
            session(['username' => Auth::user()->name]);
        } else {
            // Pelanggan tidak terotentikasi, hapus nama pelanggan dari sesi
            session()->forget('username');
        }

        return $next($request);
    }
}
