<?php

namespace App\Http\Controllers;

use App\User;
use App\Establecimiento;
use Illuminate\Http\Request;
use App\PuntuacionEstablecimiento;

class UserPuntuacionEstablecimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($usuario_id, $establecimiento_id)
    {
        //Mostrar valoraciones del establecimiento realizadas por un usuario determinado.

        $usuario = User::find($usuario_id);
        //dd($usuario);
        $valoraciones = $usuario->puntuacion_establecimientos()
                                ->where('establecimiento_id', $establecimiento_id)->get();
        $establecimiento = Establecimiento::find($establecimiento_id);

        return [
            'Establecimiento' => $establecimiento,
            'Valoración' =>$valoraciones];
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id, $establecimiento_id)
    {
        
        //Almacenar puntuación del establecimiento
        $puntuacionEstablecimiento = PuntuacionEstablecimiento::create([
            'user_id' => $user_id,
            'establecimiento_id' => $establecimiento_id,
            'puntuacion_establecimiento' => $request['puntuacion_establecimiento'],
            'comentario' => $request['comentario'],
        ]);

        return response()->json([
            'data'=>$puntuacionEstablecimiento,
            'message'=>'Registro realizado correctamente'], 201);
    }

}
