<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class AuthProtectApi extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['message' => 'Acesso não Autorizado'], 403);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                if ($this->isRouteRefresh($request->path())) {
                    return $next($request);
                }

                return response()->json(['message' => 'Token Expirado'], 401);
            } else {
                return response()->json(['message' => 'O Token de Autorização não foi encontrado.'], 404);
            }
        }
        return $next($request);
    }

    /**
     * Método responsável por verificar se a rota é a de Refresh Token.
     * 
     * @param   string  $path
     * @return  bool
     */
    protected function isRouteRefresh(string $path): bool
    {
        if ($path != "api/auth/refresh") {
            return false;
        }

        return true;
    }
}
