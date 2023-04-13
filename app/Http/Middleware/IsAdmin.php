<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
                return $next($request);
            } elseif ($user->role == 'pustakawan') {
                return redirect()->route('petugasDashboard')->with('msg', ['type' => 'danger', 'message' => 'Anda Bukan Administrator!']);
            } else {
                return redirect()->route('home')->with('msg', ['type' => 'danger', 'message' => 'Anda Bukan Administrator!']);
            }
        }
        return redirect()->route('login')->with('msg', ['type' => 'danger', 'message' => 'Silahkan Login Terlebih Dahulu!']);
    }
}
