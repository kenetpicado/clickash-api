<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;

class AuthController
{
    public function __construct(
        private readonly AuthService $authService
    ) {
        //
    }

    public function register(RegisterRequest $request)
    {
        $token = $this->authService->register($request->validated());

        return response()->json(['token' => $token]);
    }

    public function login(LoginRequest $request)
    {
        $token = $this->authService->login($request->validated());

        return response()->json(['token' => $token]);
    }

    public function logout()
    {
        $this->authService->logout();

        return response()->noContent(200);
    }
}
