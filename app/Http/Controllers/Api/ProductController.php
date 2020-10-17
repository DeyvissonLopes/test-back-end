<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductFormRequest;
use App\Http\Requests\UpdateProductFormRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    /**
     * Retorna uma lista com todos os produtos.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        return responder()->success(Product::all())->respond();
    }

    /**
     * Armazena um produto no banco de dados.
     *
     * @param  \App\Http\Requests\CreateProductFormRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateProductFormRequest $request): JsonResponse
    {
        return responder()->success(Product::store($request))->respond();
    }

    /**
     * Retorna um  produto em específico.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Product $product): JsonResponse
    {
        return responder()->success(["data" => $product])->respond();
    }

    /**
     * Atualiza um produto específico no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateProductFormRequest $request, Product $product): JsonResponse
    {
        $data = Product::updateProduct($request, $product);

        return responder()->success([
            "message" => "O produto foi atualizado com sucesso",
            "data" => $data,
        ])->respond();
    }

    /**
     * Remove um usuário do banco de dados.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product): JsonResponse
    {
        $res = $product->delete();

        return responder()->success([
            "message" => "O produto foi deletado com sucesso",
            "data" => $res,
        ])->respond();
    }
}
