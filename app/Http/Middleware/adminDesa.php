<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class adminDesa
{
    
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::guard('biodata')->user();
        
        if ($user && $user->role === 'Admin Desa') {
            return $next($request);
        }

        return abort(404, 'Not Found.');
    }
}
