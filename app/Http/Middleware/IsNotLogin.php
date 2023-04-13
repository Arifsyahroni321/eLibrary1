<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsNotLogin
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
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('adminDashboard')->with('msg', ['type' => 'success', 'message' => 'Anda Sudah Login!']);
            } elseif ($user->role == 'pustakawan') {
                return redirect()->route('petugasDashboard')->with('msg', ['type' => 'success', 'message' => 'Anda Sudah Login!']);
            } else {
                return redirect()->route('home')->with('msg', ['type' => 'success', 'message' => 'Anda Sudah Login!']);
            }
        }
        return $next($request);
    }
}
