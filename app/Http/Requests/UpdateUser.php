<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
        //dd(request()->all());
        return [
            //Usuario
            'nombre'=> 'required',
            'apellidos'=> 'required',
            'password'=> 'required',
            'email'=> 'required|unique:users|email',
            'num_telefono' => 'integer',
        ];
    }

    public function messages()
    {
        return [

            'nombre.required' => 'El :attribute es obligatorio.',
            'apellidos.required' => 'Los :attribute es obligatorio.',
            'password.required' => 'La :attribute es obligatorio.',
            
            'num_telefono.integer' => 'El :attribute debe ser un número de teléfono válido.',

            'email.required' => 'El :attribute es obligatorio.',
            'email.unique' => 'El :attribute ya está registrado.',
            'email.email' => 'El :attribute debe tener formato email válido.',        
        ];
    }

    public function attributes()
    {
        return [
            'nombre' => 'nombre de usuario',
            'apellidos' => 'apellidos',
            'password' => 'contraseña',
            'num_telefono' => 'teléfono de contacto', 
            'email' => 'correo electrónico',
        ];
    }
}
