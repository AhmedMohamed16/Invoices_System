<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = User::all();

        if ($user->Status = 'مفعل') {
            return $next($request);
        } else {
            return back()->with(['danger' => 'انت غير مفعل للدخول']);

        }
    }
}
