<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Periksa apakah pengguna memiliki peran yang diizinkan
        if ($request->user() && $request->user()->role == $role) {
            return $next($request);
        }

        // Jika tidak, kembalikan respons tidak diizinkan
        abort(403, 'Unauthorized action.');
    }
}
