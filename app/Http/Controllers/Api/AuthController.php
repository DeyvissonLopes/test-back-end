<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Obtém um JWT token a partir de credenciais corretas.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(["message" => "Usuário ou senha inválida."], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Desloga o usuário (Invalida o token atrelado ao usuário).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(): JsonResponse
    {
        auth('api')->logout();

        return responder()->success([
            "message" => "Usuário deslogado com sucesso",
        ])->respond();
    }

    /**
     * Atualiza o token do usuário.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh(): JsonResponse
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * Retorna os dados do usuário autenticado.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me(): JsonResponse
    {
        $user = auth('api')->user();

        return responder()->success([
            "id" => $user->id,
            "name" => $user->name,
            "email" => $user->email
        ])->respond();
    }

    /**
     * Método responsável por estruturar uma resposta com token.
     *
     * @param  string $token
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token): JsonResponse
    {
        return responder()->success([
            'access_token' => $token,
            'expires_in_seconds' => auth('api')->factory()->getTTL() * 60
        ])->respond();
    }
}
