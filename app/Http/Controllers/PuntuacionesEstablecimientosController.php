<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PuntuacionEstablecimiento;

class PuntuacionesEstablecimientosController extends Controller
{
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $puntuacion_id)
    {
        
        $puntuacion = PuntuacionEstablecimiento::find($puntuacion_id);
        //dd($request['puntuacion_producto']);
        $request->validate([]);
        
        $puntuacion->update([
            'user_id' => $puntuacion->user_id,
            'producto_id' => $puntuacion->establecimiento_id,
            'puntuacion_establecimiento' => $request['puntuacion_establecimiento'],
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
        $puntuacion = PuntuacionEstablecimiento::find($puntuacion_id)->delete();

        return response()->json([
            'data'=>$puntuacion,
            'message'=>'Puntuación eliminada exitosamente'], 200);
    }
}
