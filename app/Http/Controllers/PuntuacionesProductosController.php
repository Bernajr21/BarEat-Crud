<?php

namespace App\Http\Controllers;

use App\PuntuacionProducto;
use Illuminate\Http\Request;

class PuntuacionesProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $puntuacion_id)
    {
        
        $puntuacion = PuntuacionProducto::find($puntuacion_id);
        //dd($request['puntuacion_producto']);
        $request->validate([]);
        
        $puntuacion->update([
            'user_id' => $puntuacion->user_id,
            'producto_id' => $puntuacion->producto_id,
            'puntuacion_producto' => $request['puntuacion_producto'],
            'comentario' => $request['comentario'],
        ]);

        return response()->json([
            'data' => $puntuacion,
            'message' => 'Actualización realización correctamente'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($puntuacion_id)
    {
        //Comprobar si existe la puntuación que buscamos

        //Eliminar puntuación
        $puntuacion = PuntuacionProducto::find($puntuacion_id)->delete();

        return response()->json([
            'data'=>$puntuacion,
            'message'=>'Puntuación eliminada exitosamente'], 200);
    }

}
