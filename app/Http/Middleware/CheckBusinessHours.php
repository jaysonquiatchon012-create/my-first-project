<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckBusinessHours
{
    public function handle(Request $request, Closure $next): Response
    {
        // Kunin ang current time
        $now = now();

        // Check kung weekend
        $isWeekend = $now->isWeekend();

        // Check kung nasa pagitan ng 9 AM at 5 PM
        $isBusinessHours = $now->hour >= 9 && $now->hour < 17;

        // Kung weekend o outside business hours, harangin
        if ($isWeekend || !$isBusinessHours) {
            abort(403, 'Flash sale is available Monday to Friday, 9 AM to 5 PM only.');
        }

        // Kung pasok sa business hours, ituloy ang request
        return $next($request);
    }
}