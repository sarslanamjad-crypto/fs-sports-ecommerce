<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->has('id')) {
            return redirect('admin/login')->with('error', 'Please login first.');
        }

        $admin = \App\Models\Admin::find($request->session()->get('id'));
        if (!$admin || $admin->status != 1) {
            $request->session()->forget(['id', 'first_name', 'last_name', 'email']);
            return redirect('admin/login')->with('error', 'Your account is disabled.');
        }

        return $next($request);
    }
}
