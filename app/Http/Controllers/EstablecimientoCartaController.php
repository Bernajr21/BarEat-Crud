<?php

namespace App\Http\Controllers;

use App\Carta;
use Illuminate\Http\Request;

class EstablecimientoCartaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //Insertamos la carta del establecimiento
        $carta = Carta::create([
            'establecimiento_id' => $id,
        ]);
        return response()->json([
            'data'=>$carta,
            'message'=>'Registro realizado correctamente'], 201);
    }

}
