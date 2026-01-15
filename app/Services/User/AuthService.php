<?php

declare(strict_types=1);

namespace App\Services\User;

use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function login(LoginRequest $request): User
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            throw new AuthenticationException('Пользователь с такой почтой или паролем не был найден');
        }

        $user = User::where('email', $request->email)->first();

        return $user;
    }

    public function register(RegisterRequest $request): User
    {
        $validatedData = $request->only([
            'name',
            'email',
            'password',
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        return $user;
    }

    public function createToken(User $user)
    {
        return response()->json(
            array_merge(
                (new UserResource($user))->toArray(request()), // Преобразуем ресурс в массив
                [
                    'token' => $user->createToken('API TOKEN')->plainTextToken, // Добавляем токен
                ]
            ),
            200
        );
    }
}
