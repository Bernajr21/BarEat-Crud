<?php

namespace App\Http\Controllers;

use App\Carta;
use App\Producto;
use App\Establecimiento;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProducto;
use App\Http\Requests\UpdateProducto;

class EstablecimientoProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Establecimiento $establecimiento)
    {
        //Mostrar productos del establecimiento
        $productos = $establecimiento->productos_carta()->get();
        return $productos;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function response(array $errors)
    {
        if ($this->expectsJson()) {
            return new JsonResponse($errors, 422);
        }

        return $this->redirector->to($this->getRedirectUrl())
            ->withInput($this->except($this->dontFlash))
            ->withErrors($errors, $this->errorBag);
    }
    public function store(StoreProducto $request, Establecimiento $establecimiento)
    {
        
        //Habría que comprobar que un mismo establecimiento no pueda insertar dos productos iguales?

        $establecimiento_id = $establecimiento->id;
        $carta_id = $establecimiento->carta()->where('establecimiento_id', $establecimiento_id)->first();
//dd($carta_id->id);
        $request->validated();
        //Almacenar productos del establecimiento
        $producto = Producto::create([
            'nombre_producto' => $request['nombre_producto'],
            'descripcion_producto' => $request['descripcion_producto'],
            'precio_producto' => $request['precio_producto'],
            'tipo_producto' => $request['tipo_producto'],
            'carta_id' => $carta_id->id,
            //'ruta_foto_principal' => $request['ruta_foto_principal'],
        ]);

        return response()->json([
            'data'=>$producto,
            'message'=>'Registro realizado correctamente'], 200);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($establecimiento_id, $producto_id)
    {
        //Comprobar que existe el producto que estamos buscando para el establecimiento indicado

        //Mostrar un producto concreto de un establecimiento determinado
        $producto = Establecimiento::find($establecimiento_id)->productos_carta()->find($producto_id);
        return $producto;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($establecimiento_id, $producto_id)
    {
        //Comprobar si existe el producto que buscamos

        //Eliminar producto
        $producto = Establecimiento::find($establecimiento_id)->productos_carta()->find($producto_id)->delete();

        return response()->json([
            'data'=>$producto,
            'message'=>'Producto eliminado exitosamente'], 200);
    }
}
