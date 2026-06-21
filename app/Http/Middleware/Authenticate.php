<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return mixed
     */
    public function handle($request, \Closure $next, ...$guards)
    {
        // Admin routes and sanctum routes fall back to standard Laravel authentication
        if ($request->is('admin*') || in_array('sanctum', $guards)) {
            $this->authenticate($request, $guards);
            return $next($request);
        }

        // Frontend customer authentication check
        if (!$request->session()->has('user_id')) {
            $request->session()->flash('error', 'Please login to continue.');

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please login first.'
                ], 401);
            }

            return redirect()->route('login_signup.html');
        }

        return $next($request);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login_signup.html');
        }
    }
}
