<?php

namespace App\Http\Controllers;

use App\Establecimiento;
use Illuminate\Http\Request;

class EstablecimientoReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Establecimiento $establecimiento)
    {
        //Mostrar imágenes del establecimiento
        $reservas = $establecimiento->reservas()->get();
        return $reservas;
    }
}
