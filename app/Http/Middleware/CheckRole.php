<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::guard('biodata')->user();
        
        if ($user && $user->role === 'Admin Master') {
            return $next($request);
        }

        return abort(404, 'Not Found.');
    }
}
