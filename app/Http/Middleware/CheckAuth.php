<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        // Sessiyada foydalanuvchi ma'lumotlari bo'lmasa → loginga qayt
        if (!session()->has('auth.user')) {
            return redirect()->route('login')
                ->with('error', 'Iltimos, tizimga kiring.');
        }

        return $next($request);
    }
}
