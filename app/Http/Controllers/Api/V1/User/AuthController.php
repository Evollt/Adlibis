<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Services\User\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function register(RegisterRequest $request, AuthService $authService): JsonResponse
    {
        $user = $authService->register($request);

        return $authService->createToken($user);
    }

    public function login(LoginRequest $request, AuthService $authService): JsonResponse
    {
        $user = $authService->login($request);

        return $authService->createToken($user);
    }
}
