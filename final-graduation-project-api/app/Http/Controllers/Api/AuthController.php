<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        try {
            $response = Http::asForm()->post(config('services.passport.client_host'), [
                'grant_type' => 'password',
                'client_id'  => config('services.passport.client_id'),
                'client_secret' => config('services.passport.client_secret'),
                'username' => $request->email,
                'password' => $request->password,
            ]);

            return response()->json($response->body());
        } catch (BadResponseException $exception) {
            match ($exception->getCode()) {
                400     => $message = 'Invalid Request. Please enter a username or a password.',
                401     => $message = 'Your credentials are incorrect. Please try again.',
                default => $message = 'Something went wrong on the server.',
            };

            return response()->json($message, $exception->getCode());
        }
    }

    public function logout(): JsonResponse
    {
        auth()->user()->tokens->each(fn ($token, $key) => $token->delete());

        return response()->json('Logout successfully!');
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
