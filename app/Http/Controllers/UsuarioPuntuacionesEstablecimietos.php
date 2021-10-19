<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsuarioPuntuacionesEstablecimietos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        $puntuaciones = User::find($user_id)->puntuacion_establecimientos()->with('establecimiento')->get()->all();
       
        return $puntuaciones;
    }

}
