<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'document_number' => $request->document_number,
            'password' => Hash::make($request->password)
        ]);

        return response(null, 204);
    }

    public function login(LoginRequest $request)
    {
        $user = User::where(['phone' => $request->phone])->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'error' => [
                    'code' => 401,
                    'message' => 'Unauthorized',
                    'errors' => ['phone or password incorrect']
                ]
            ])->setStatusCode(401);
        }

        $token = Str::random(128);
        $user->api_token = $token;
        $user->save();

        return response()->json([
            'data' => [
                'token' => $token
            ]
        ])->setStatusCode(200);
    }

    public function getInfo(Request $request)
    {
        $user = User::where(['api_token' => $request->bearerToken()])->first();

        return new UserResource($user);
    }
}
