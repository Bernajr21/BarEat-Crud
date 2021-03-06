<?php

namespace App\Http\Controllers;

use App\Carta;
use App\Establecimiento;
use App\Producto;
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

    public function index(Request $request)
    {

        $producto = Producto::all();
        $establecimiento = Establecimiento::all();

        $datos['cartas'] = Carta::paginate(15);
        return view('carta.index', $datos,compact('establecimiento','producto'));
    }

    public function create()
    {
        $carta = Carta::all();
        $establecimiento = Establecimiento::all();
        return view('carta.create',compact('carta','establecimiento'));
    }

    public function store(Request $request)
    {
       

        $datosCarta = request()->except('_token');




        //Hacemos el insert
        Carta::insert($datosCarta);

        return redirect('carta')->with('mensaje', 'Carta agregada con exito');
    }
}
