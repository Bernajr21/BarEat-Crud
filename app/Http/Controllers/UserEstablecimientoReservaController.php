<?php

namespace App\Http\Controllers;

use App\User;
use App\Reserva;
use App\Establecimiento;
use Illuminate\Http\Request;

class UserEstablecimientoReservaController extends Controller
{
        
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id, $establecimiento_id)
    {
        //Comprobar que no se pueden hacer más reselvas que comensales --> mensaje "No hay mesas disponibles"
        //Comprobar si existe la reserva antes de  hacerla
        
        //Almacenar reserva del establecimiento
        $reserva = Reserva::create([
            'user_id' => $user_id,
            'establecimiento_id' => $establecimiento_id,
            'num_comensales' => $request['num_comensales'],
            'fecha' => $request['fecha'],
            'hora' => $request['hora'],
        ]);
        
        return response()->json([
            'data'=>$reserva,
            'message'=>'Registro realizado correctamente'], 201);
    }

}
