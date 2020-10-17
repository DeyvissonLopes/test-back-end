<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Atributos que podem ser atribuídos em massa.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'weight',
    ];

    /**
     * Método responsável por criar um produto.
     * 
     * @param   \Illuminate\Http\Request    $request
     * @return  \App\Models\Product
     */
    public static function store(Request $request)
    {
        $product = self::create([
            "name" => $request->name,
            "price" => $request->price,
            "weight" => $request->weight,
        ]);

        return $product;
    }

    /**
     * Método responsável por atualizar os dados de um produto.
     * 
     * @param   \Illuminate\Http\Request    $request
     * @param   \App\Models\Product $product
     * @return  bool    $res
     */
    public static function updateProduct(Request $request, Product $product): bool
    {
        // Salvamos em variáveis os novos dados que serão atualizados do produto.
        $newName = $request->name ?? $product->name;
        $newPrice = $request->price ?? $product->price;
        $newWeight = $request->weight ?? $product->weight;

        // Substituímos os dados do produto pelos novos dados.
        $product->name = $newName;
        $product->price = $newPrice;
        $product->weight = $newWeight;

        // Salvamos as alterações.
        $res = $product->save();

        return $res;
    }
}
