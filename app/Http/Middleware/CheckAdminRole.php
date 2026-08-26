<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminRole
{
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Kunin ang role mula sa URL
        $role = $request->query('role');

        // 2. Check kung admin ang role
        if ($role !== 'admin') {
            abort(403, 'Access Denied.');
        }

        // 3. Kung admin, ituloy ang request
        return $next($request);
    }
}