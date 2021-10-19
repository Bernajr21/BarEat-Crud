<?php

namespace App\Http\Controllers;

use App\Establecimiento;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEstablecimiento;

class UserEstablecimientoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEstablecimiento $request, $usuario_id)
    {
       $request->validated();
        //Almacenar establecimiento
        $establecimiento = Establecimiento::create([
            "user_id" => $usuario_id,
            'nombre_establecimiento' => $request['nombre_establecimiento'],
            'descripcion_establecimiento' => $request['descripcion_establecimiento'],
            'dirección_establecimiento' => $request['dirección_establecimiento'],
            'num_telefono' => $request['num_telefono'],
            'email' => $request['email'],
            'tipo_establecimiento' => $request['tipo_establecimiento'],
            'nif' => $request['nif'],
            'maximo_numero_comensales' => $request['maximo_numero_comensales'],
            'aforo' => $request['aforo'],
        ]);

        return response()->json([
            'data'=>$establecimiento,
            'message'=>'Registro realizado correctamente'], 201);
    }
}
