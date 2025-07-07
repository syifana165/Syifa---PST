<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES.');
        }

        // Ambil role user & trim + lowercase
        $userRole = strtolower(trim(Auth::user()->role));

        // Normalisasi semua role yang diizinkan
        $allowedRoles = array_map(function ($role) {
            return strtolower(trim($role));
        }, $roles);

        if (!in_array($userRole, $allowedRoles)) {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES.');
        }

        return $next($request);
    }
}
