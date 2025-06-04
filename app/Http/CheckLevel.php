<?php
// app/Http/Middleware/CheckLevel.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLevel
{
    public function handle(Request $request, Closure $next, ...$levels)
    {
        $user = Auth::user();

        if (!$user || !in_array($user->level, $levels)) {
            abort(403, 'Akses ditolak.');
        }

        return $next($request);
    }
}
