<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use JWTAuth;

class CheckDestroyUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = JWTAuth::toUser($request->input('token'));
        $userDestroy = User::where('id', '=', $request->route()->parameters())->first();
        if (isset($userDestroy->id)) {
            if ($user->id_chucvu == 1 && $user->id_chucvu < $userDestroy->id_chucvu) {
                return $next($request);
            } else {
                return response()->json(['status' => 'false', 'message' => 'You have not rights']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'User is not found']);
        }
    }
}
