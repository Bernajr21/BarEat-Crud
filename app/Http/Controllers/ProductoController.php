<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProducto;
use App\Http\Resources\ProductoResource;

use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        if ($request->is('api/*')) {
        } else {
        }
        $datos['producto'] = Producto::paginate(5);
        return view('producto.index', $datos);
    }

    public function create()
    {
        return view('producto.create');
    }

    public function update(UpdateProducto $request, $id)
    {
        if ($request->is('api/*')) {
            $producto = Producto::find($id);
            $producto->update($request->validated());

            return response()->json([
                'data' => $producto,
                'message' => 'Registro realizado correctamente'
            ], 201);
        } else {
            $campos = [
                'nombre_producto' => 'required|string|max:20',
                'descripcion_producto' => 'required|string|max:100',
                'precio_producto' => 'required',
                'tipo_producto' => 'required',
                'carta_id' => 'required',
                'ruta_foto_principal' => 'required|max:10000|mimes:jpeg,png,jpg',
            ];

            $mensaje = [
                'required' => 'El :attribute es obligatorio',
                'ruta_foto_principal.required' => 'La fotografía es obligatoria',
                'string' => 'Introduzca el formato correcto',


            ];

            if ($request->hasFile('ruta_foto_principal')) {
                $campos = ['ruta_foto_principal' => 'required|max:10000|mimes:jpeg,png,jpg',];
                $mensaje = ['ruta_foto_principal.required' => 'La fotografía es obligatoria'];
            }

            $this->validate($request, $campos, $mensaje);

            $datosProducto = request()->except(['_token', '_method']);


            if ($request->hasFile('ruta_foto_principal')) {
                $producto = Producto::findOrFail($datosProducto);
                Storage::delete('public/' . $producto->ruta_foto_principal);
                $datosEstablecimiento['ruta_foto_principal'] = $request->file('ruta_foto_principal')->store('uploads', 'public');
            }

            Producto::where('id', '=', $datosProducto)->update($datosEstablecimiento);

            $establecimiento = Producto::findOrFail($datosProducto);

            //return view('establecimiento.edit', compact('establecimiento'));
            return redirect('establecimiento')->with('mensaje', 'Establecimiento Editado');
        }
    }



    public function edit($id)
    {
        $producto = Producto::findOrFail($id);



        return view('producto.edit', compact('producto'));
    }

    public function store(Request $request)
    {
        //validacion de formularios 

        $campos = [
            'nombre_producto' => 'required|string|max:20',
            'descripcion_producto' => 'required|string|max:100',
            'precio_producto' => 'required',
            'tipo_producto' => 'required',
            'carta_id' => 'required',
            'ruta_foto_principal' => 'required|max:10000|mimes:jpeg,png,jpg',
        ];

        $mensaje = [
            'required' => 'El :attribute es obligatorio',
            'ruta_foto_principal.required' => 'La fotografía es obligatoria',
            'string' => 'Introduzca el formato correcto',


        ];

        $this->validate($request, $campos, $mensaje);

        $datosProducto = request()->except('_token');

        //Para la fotografía
        if ($request->hasFile('ruta_foto_principal')) {
            $datosProducto['ruta_foto_principal'] = $request->file('ruta_foto_principal')->store('uploads', 'public');
        }



        //Hacemos el insert
        Producto::insert($datosProducto);

        return redirect('producto')->with('mensaje', 'Producto agregado con exito');
    }

    public function destroy(Request $request, $producto_id)
    {

        $establecimiento = Producto::findOrFail($producto_id);

        if (Storage::delete('public/' . $establecimiento->ruta_foto_principal)) {
            Producto::destroy($producto_id);
        }

        return redirect('establecimiento')->with('mensaje', 'Establecimiento borrado');
    }
}
