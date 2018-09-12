<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;

class CheckMod
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = JWTAuth::toUser($request->input('token'));
        if ($user->id_chucvu <= 2) {
            return $next($request);
        } else {
            return response()->json(['status' => false, 'message' => 'You have not rights']);
        }
    }
}
