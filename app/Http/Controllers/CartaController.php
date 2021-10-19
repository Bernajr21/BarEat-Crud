<?php

namespace App\Http\Controllers;

use App\Carta;
use Illuminate\Http\Request;

class CartaController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($carta_id)
    {
        //dd($carta_id);
        //Mostrar una carta determinada (teniendo en cuenta sus ids)
        $carta = Carta::find($carta_id)->productos()->get();
        //dd($carta_id);
        return $carta;
    }
}
