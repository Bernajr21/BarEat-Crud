<?php

namespace App\Http\Controllers;

use App\Imagen;
use App\Establecimiento;
use Illuminate\Http\Request;

class EstablecimientoImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Establecimiento $establecimiento)
    {
        //Mostrar imágenes del establecimiento
        $imgs = $establecimiento->imagenes()->get();
        return $imgs;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Establecimiento $establecimiento)
    {
        //Almacenar imagen del establecimiento
        $establecimiento = Imagen::create([
            'ruta_imagen' => $request['ruta_imagen'],
            'descripcion_imagen' => $request['descripcion_imagen'],
            'ancho' => $request['ancho'],
            'alto' => $request['alto'],
            'establecimiento_id' => $establecimiento->id,
        ]);

        return response()->json([
            'data'=>$establecimiento,
            'message'=>'Registro realizado correctamente'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($establecimiento_id, $imagen_id)
    {
        //Mostrar una imagen concreta de un establecimiento determinado (teniendo en cuenta sus id)
        $imagen = Establecimiento::find($establecimiento_id)->imagenes()->find($imagen_id);
        return $imagen;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($establecimiento_id, $imagen_id)
    {
        //Comprobar si existe la imagen que buscamos
        
        //Eliminar imagen
        $imagen = Establecimiento::find($establecimiento_id)->imagenes()->find($imagen_id)->delete();

        return response()->json([
            'data'=>$imagen,
            'message'=>'Imagen eliminada exitosamente'], 200);
    }
}
