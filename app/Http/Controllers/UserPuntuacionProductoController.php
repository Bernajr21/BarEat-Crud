<?php

namespace App\Http\Controllers;

use App\Producto;
use App\PuntuacionProducto;
use Illuminate\Http\Request;

class UserPuntuacionProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($usuario_id, $producto_id)
    {
        //Mostrar valoraciones del producto realizadas por un usuario determinado.

        $producto = Producto::find($producto_id);
        $valoraciones = $producto->puntuaciones_producto()->where('user_id', $usuario_id)->get();
        
        return [
            'Producto' => $producto,
            'Valoración' =>$valoraciones];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id, $producto_id)
    {
        //Almacenar puntuación del establecimiento
        $puntuacionProducto = PuntuacionProducto::create([
            'user_id' => $user_id,
            'producto_id' => $producto_id,
            'puntuacion_producto' => $request['puntuacion_producto'],
            'comentario' => $request['comentario'],
        ]);

        return response()->json([
            'data'=>$puntuacionProducto,
            'message'=>'Registro realizado correctamente'], 201);
    }
}
