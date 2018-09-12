<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use App\User;
use App\Post;

class CheckDestryPost
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
        $postEdit = Post::find($request->post);
        $authorPost = User::find($postEdit->id_user);
        $user = JWTAuth::toUser($request->input('token'));
        if ($user->id_chucvu == $authorPost->id_chucvu || $user->id_chucvu < $authorPost->id_chucvu) {
            return $next($request);
        } else {
            return response()->json(['status' => false, 'message' => 'You have not rights']);
        }
    }
}
