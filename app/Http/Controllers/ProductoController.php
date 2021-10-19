<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProducto;

class ProductoController extends Controller
{
    
    public function update(UpdateProducto $request, $id)
    {
        $producto = Producto::find($id);
        $producto->update($request->validated());

        return response()->json([
            'data'=>$producto,
            'message'=>'Registro realizado correctamente'], 201);

    }
}
