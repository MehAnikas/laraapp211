<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(RegisterRequest $request) {
        $user = User::query()->create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => 3
        ]);

        return response($user, Response::HTTP_CREATED);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response([
                'error' => 'Некорректные данные'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $token = $request->user()->createToken('token')->plainTextToken;
        $cookie = cookie('jwt', $token, 60*24);

        return response([
            'message' => 'Успешно'
        ])->cookie($cookie);


    }
    public function user(Request $request) {
        return $request->user();
    }

    public function logout(Request $request) {
        $cookie = Cookie::forget('jwt');
        $request->user()->tokens()->delete();
        return response([
            'message' => 'Успешно'
        ])->cookie($cookie);
    }
}
