<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use JWTAuth;
use Mockery\Exception;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('sodienthoai', 'password');
        $user = User::where('sodienthoai', $request->get('sodienthoai'))->first();
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['status' => false, 'error' => 'invalid_credentials']);
            }
        } catch (JWTException $e) {
            return response()->json(['status' => false, 'error' => 'could_not_create_token']);
        }

        return response()->json(['status' => true, 'data' => compact('user', 'token')]);
    }

    public function refreshToken(Request $request)
    {
        $token = JWTAuth::refresh($request->get('token'));
        return response()->json(compact('token'));
    }

    public function logout()
    {
        try {
            $token = JWTAuth::getToken();
            JWTAuth::invalidate($token);
            return response()->json(array('status' => true, 'message' => 'Logout successfuly'), 200);
        } catch (Exception $e) {
            return response()->json(array(['status' => false, 'message' => 'Logout error']), 404);
        }
    }
}
