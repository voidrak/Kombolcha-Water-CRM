<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed ',
            'woreda' => 'required|string ',
            'kebele' => 'required|numeric ',
            'house_number' => 'required|numeric ',
        ]);

        $uniqueCombination = User::where('woreda', $fields['woreda'])
            ->where('kebele', $fields['kebele'])
            ->where('house_number', $fields['house_number'])
            ->exists();

        if ($uniqueCombination) {
            return response()->json([
                'errors' => [
                    'location' => 'This Location has already been taken.',
                ]
            ], 422);
        }



        $user =  User::create($fields);

        $token = $user->createToken($request->name);

        return ['user' => $user, 'token' => $token->plainTextToken];
    }

    public function login(Request $request)
    {
        $request->validate([

            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return [
                'errors' => [
                    'email' => 'Invalid credentials',
                ]
            ];
        };

        $token = $user->createToken($user->name);
        return ['user' => $user, 'token' => $token->plainTextToken];

        return  $user;
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return ['message' => 'Your are log out'];
    }
}
