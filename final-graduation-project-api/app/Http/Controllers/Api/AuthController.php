<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        try {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                $token = $user->createToken('Token Name')->accessToken;

                return response()->json(['access_token' => $token]);
            }
        } catch (Exception $exception) {
            Log::error($exception);

            match ($exception->getCode()) {
                400     => $message = 'Invalid Request. Please enter a username or a password.',
                401     => $message = 'Your credentials are incorrect. Please try again.',
                default => $message = 'Something went wrong on the server.',
            };

            return response()->json([
                'success' => false,
                'message' => $message,
            ], $exception->getCode() ?: 500);
        }
    }

    public function logout(): JsonResponse
    {
        auth()->user()->tokens->each(fn ($token) => $token->delete());

        return response()->json([
            'success' => true,
            'message' => 'Logout successfully!',
        ]);
    }

    public function register(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json($user);
    }
}
