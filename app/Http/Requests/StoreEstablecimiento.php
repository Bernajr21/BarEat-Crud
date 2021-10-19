<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEstablecimiento extends FormRequest
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

            //Establecimiento
            'nombre_establecimiento' => 'required',
            'descripcion_establecimiento' => 'required',
            'dirección_establecimiento' => 'required',
            'num_telefono' => 'required|integer', //RegExp para formato telf (móvil o fijo?)
            'email' => 'required|unique:establecimientos|email',
            'tipo_establecimiento' => 'required',
            //'nif' => 'required', //RegExp para formato NIF
    
        ];
    }

    public function messages()
    {
        return [
            'nombre_establecimiento.required' => 'El :attribute es obligatorio.',
            'descripcion_establecimiento.required' => 'La :attribute es obligatoria.',
            'dirección_establecimiento.required' => 'La :attribute es obligatoria.',
    
            'num_telefono.required' => 'El :attribute es obligatorio.',
            'num_telefono.integer' => 'El :attribute debe ser un número de teléfono válido.',

            'email.required' => 'El :attribute es obligatorio.',
            'email.unique' => 'El :attribute ya está registrado.',
            'email.email' => 'El :attribute debe tener formato email válido.',
        ];
    }

    public function attributes()
    {
        return [
            'nombre_establecimiento' => 'nombre del establecimiento',
            'descripcion_establecimiento' => 'descripción del establecimiento',
            'dirección_establecimiento' => 'dirección del establecimiento',
            'num_telefono' => 'teléfono de contacto', 
            'email' => 'email',
            'tipo_establecimiento' => 'tipo de establecimiento',
        ];
    }
}
