<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductRequest extends FormRequest
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

    public function messages()
    {
        return [
            'titulo' => 'Se requiere',
            'titulo.rada' => 'No dijiste la palabra magica',
            'descripcion.required' => 'Se requiere :attribute',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo' => 'required|string|rada:mes,otro',
            'descripcion' => 'nullable|string',
            'product_type_id' => 'nullable|exists:product_types,id'
        ];
    }
}
