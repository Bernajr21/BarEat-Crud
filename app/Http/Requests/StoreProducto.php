<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProducto extends FormRequest
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
            //Establecimiento productos
            'nombre_producto' => 'required',
            'descripcion_producto' => 'required',
            'precio_producto' => 'required|integer',
            'tipo_producto'=> 'required',
        ];
    }

    public function messages()
    {
        return [
            'nombre_producto.required' => 'El :attribute es obligatorio.',
            'descripcion_producto.required' => 'La :attribute es obligatorio.',
            'precio_producto.required' => 'El :attribute es obligatorio.',
            'precio_producto.integer' => 'La :attribute debe tener valor numérico.',
            'tipo_producto.required' => 'El :attribute es obligatorio.',    
        ];
    }

    public function attributes()
    {
        return [
            'nombre_producto' => 'nombre del producto',
            'descripcion_producto' => 'descripción del producto',
            'precio_producto' => 'precio',
            'tipo_producto'=> 'tipo de producto',
        ];
    }
}
