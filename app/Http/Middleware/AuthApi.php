<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AuthApi
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token || !User::where(['api_token' => $token])->first()) {
            return response()->json([
                'error' => [
                    'code' => 401,
                    'message' => 'Unauthorized'
                ]
            ]);
        }

        $request->currentUser = User::where(['api_token' => $token])->first();

        return $next($request);
    }
}
