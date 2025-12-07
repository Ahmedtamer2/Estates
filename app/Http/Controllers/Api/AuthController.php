<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use App\Models\User;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = JWTAuth::fromUser($user);

        $data = [
            'user'  => $user,
            'token' => $token
        ];

        return ApiResponse::sendResponse(200, 'User registered successfully', $data);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return ApiResponse::sendResponse(401, 'Invalid credentials', null);
        }

        $data = [
            'user'  => auth()->user(),
            'token' => $token
        ];

        return ApiResponse::sendResponse(200, 'Login successful', $data);
    }


    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return ApiResponse::sendResponse(200, 'Logged out successfully', ['message' => 'Logged out successfully']);
    }

    public function me()
    {
        return ApiResponse::sendResponse(200, 'User data retrieved successfully', auth()->user());
    }
}
