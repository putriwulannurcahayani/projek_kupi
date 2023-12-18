<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            throw new HttpResponseException(response()->json([
                'errors' => $validator->errors()
            ], 400));
        }

        if (Auth::attempt($request->only(['email','password']))) {

            $user = auth()->user();
            $token = $user->createToken("api_token")->plainTextToken;

            return response()->json(["token" => $token,"user" => $user], 200);
        }

        throw new HttpResponseException(response()->json([
            "error" => [
                "message" => "Email atau password Salah"
            ]
        ], 401));
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Token Berhasil Dihapus']);
    }
}