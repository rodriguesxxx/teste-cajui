<?php

namespace App\Http\Controllers;

use App\Facades\Response;
use App\Http\Requests\LoginRequest;
use App\Services\IAuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __construct(private IAuthService $authService)
    {
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $data = $request->validated();

        $token = $this->authService->login($data);

        return Response::success()
            ->message("Login efetuado com sucesso!")
            ->data(['token' => $token])
            ->send();
    }
}
