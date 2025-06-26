<?php

namespace App\Http\Controllers;

use App\Facades\Response;
use App\Http\Requests\LoginRequest;
use App\Services\IAuthService;
use Dedoc\Scramble\Attributes\Parameter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(private IAuthService $authService)
    {
    }
    /**
     * @unauthenticated
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $data = $request->validated();

        $token = $this->authService->login($data);

        return Response::success()
            ->message("Login efetuado com sucesso!")
            ->data(['token' => $token])
            ->send();
    }

    public function logout(Request $reuest)
    {
        Auth::logout();

        return Response::success()
            ->message("Logout efetuado com sucesso!")
            ->send();
    }
}
