<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $user = auth()->user();

        if ($user->can('medicine_and_health') && $request->sectionSlug == 'medicine-and-health') {
            return $next($request);
        } elseif ($user->can('health_and_beauty') && $request->sectionSlug == 'health-and-beauty') {
            return $next($request);
        } elseif ($user->can('pregnancy_and_birth') && $request->sectionSlug == 'pregnancy-and-birth') {
            return $next($request);
        } elseif ($user->can('diseases') && $request->sectionSlug == 'diseases') {
            return $next($request);
        } elseif ($user->can('medicines') && $request->sectionSlug == 'medicines') {
            return $next($request);
        } elseif ($user->can('calories') && $request->sectionSlug == 'calories') {
            return $next($request);
        } else {
            return redirect()->back()->with('error', 'ليس لديك صلاحية المرور');
        }
    }
}
