<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Facades\Response;

class JwtMiddleware
{
    public function handle(Request $request, Closure $next): JsonResponse
    {
        try {
            JWTAuth::parseToken()->authenticate();

            return $next($request);
        } catch (TokenInvalidException $e) {
            return Response::error()->status(HttpResponse::HTTP_UNAUTHORIZED)->message('O token informado é inválido!')->send();
        } catch (TokenExpiredException $e) {
            return Response::error()->status(HttpResponse::HTTP_UNAUTHORIZED)->message('O token informado já expirou!')->send();
        } catch (\Exception $e) {
            return Response::error()->status(HttpResponse::HTTP_UNAUTHORIZED)->message('Forneça um token para autenticação!')->send();
        }
    }
}
