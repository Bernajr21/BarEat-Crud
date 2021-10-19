<?php

namespace App\Http\Controllers;

use App\Establecimiento;
use Illuminate\Http\Request;

class EstablecimientoPuntuacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Establecimiento $establecimiento)
    {
       
        //Mostrar las puntuaciones de un establecimiento determinado
        $puntuaciones = $establecimiento->puntuaciones_establecimiento()->get();
        return $puntuaciones;
    }

}
