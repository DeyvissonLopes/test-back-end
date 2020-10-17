<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "string|max:255|min:3",
            "price" => "numeric",
            "weight" => "numeric",
        ];
    }

    /**
     * Get custom messages for validator errors.
     * 
     * @return  array
     */
    public function messages()
    {
        return [
            "name.string" => "O nome do produto deve ser do tipo string, verifique sua requisição",
            "price.integer" => "O preço do produto deve ser um valor numérico, verifique sua requisição",
            "weight.integer" => "O peso do produto deve ser um valor numérico, verifique sua requisição",

            "name.max" => "O nome do produto deve ter no máximo 255 caracteres, verifique sua requisição",
            "name.min" => "O nome do produto deve ter no mínimo 3 caracteres, verifique sua requisição",
        ];
    }
}
