<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        // token
        $user = User::where('email',$request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)) throw ValidationException::withMessages(['email' => 'invalid credentials']);
        $token = $user->createToken('web-token',['musician.index','musician.show']);
        return response()->json([
            'user' => $user,
            'token' => $token->plainTextToken
        ]);
    }
}
