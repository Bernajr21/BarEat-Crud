<?php

namespace App\Http\Controllers;

use App\Establecimiento;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateEstablecimiento;
use App\Http\Resources\EstablecimientoResource;

use Illuminate\Support\Facades\Storage;

class EstablecimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->is('api/*')) {
            //Mostrar establecimientos
            $establecimientos = Establecimiento::all();
            return $establecimientos;
        } else {
            $datos['establecimiento'] = Establecimiento::paginate(5);
            return view('establecimiento.index', $datos);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($establecimiento_id)
    {
        $establecimiento = Establecimiento::find($establecimiento_id);
        //return $establecimiento;
        return new EstablecimientoResource($establecimiento);
    }
    public function create()
    {
        return view('establecimiento.create');
    }

    public function edit($id)
    {
        $establecimiento = Establecimiento::findOrFail($id);

       
        
        return view('establecimiento.edit', compact('establecimiento'));
    }

    public function store(Request $request)
    {
        //validacion de formularios 

        $campos = [
            'nombre_establecimiento' => 'required|string|max:20',
            'descripcion_establecimiento' => 'required|string|max:100',
            'dirección_establecimiento' => 'required|string|max:100',
            'num_telefono' => 'string|max:10',
            'email' => 'email|required|max:20',
            'tipo_establecimiento' => 'required|string|max:20',
            'nif' => 'string|required|max:20',
            'maximo_numero_comensales' => 'required|string|max:20',
            'aforo' => 'required|string|max:20',
            'ruta_foto_principal' => 'required|max:10000|mimes:jpeg,png,jpg',
            'user_id' => 'string|required|max:20',
        ];

        $mensaje = [
            'required' => 'El :attribute es obligatorio',
            'ruta_foto_principal.required' => 'La fotografía es obligatoria',
            'string' => 'Introduzca el formato correcto',


        ];

        $this->validate($request, $campos, $mensaje);

        $datosEstablecimiento = request()->except('_token');

        //Para la fotografía
        if ($request->hasFile('ruta_foto_principal')) {
            $datosEstablecimiento['ruta_foto_principal'] = $request->file('ruta_foto_principal')->store('uploads', 'public');
        }



        //Hacemos el insert
        Establecimiento::insert($datosEstablecimiento);

        //Cuando le enviemos un establecimiento, obtiene toda la información, y responde con un mensaje y la redirección
        return redirect('establecimiento')->with('mensaje', 'Establecimiento agregado con exito');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstablecimiento $request, $establecimiento_id)
    {
        if ($request->is('api/*')) {
            $establecimiento = Establecimiento::find($establecimiento_id);
            $request->validated([]);

            $establecimiento->update([
                'nombre_establecimiento' => $request['nombre_establecimiento'],
                'descripcion_establecimiento' => $request['descripcion_establecimiento'],
                'dirección_establecimiento' => $request['dirección_establecimiento'],
                'num_telefono' => $request['num_telefono'],
                'email' => $request['email'],
                'tipo_establecimiento' => $request['tipo_establecimiento'],
                'nif' => $request['nif'],
                'maximo_numero_comensales' => $request['maximo_numero_comensales'],
                'aforo' => $request['aforo'],
                'ruta_foto_principal' => $request['ruta_foto_principal'],
                'user_id' => $request['user_id'],
            ]);

            return response()->json([
                'data' => $establecimiento,
                'message' => 'Actualización realización correctamente'
            ], 200);
        } else {

            $campos = [
                'nombre_establecimiento' => 'required|string|max:20',
                'descripcion_establecimiento' => 'required|string|max:100',
                'dirección_establecimiento' => 'required|string|max:100',
                'num_telefono' => 'string|max:10',
 
                'tipo_establecimiento' => 'required|string|max:20',
                'nif' => 'string|required|max:20',
                'maximo_numero_comensales' => 'required|string|max:20',
                'aforo' => 'required|string|max:20',
                'ruta_foto_principal' => 'max:10000|mimes:jpeg,png,jpg',
                'user_id' => 'string|required|max:20',
            ];

            $mensaje = [
                'required' => 'El :attribute es obligatorio',

                'string' => 'Introduzca el formato correcto',


            ];

            if ($request->hasFile('ruta_foto_principal')) {
                $campos = ['ruta_foto_principal' => 'required|max:10000|mimes:jpeg,png,jpg',];
                $mensaje = ['ruta_foto_principal.required' => 'La fotografía es obligatoria'];
            }

            $this->validate($request, $campos, $mensaje);

            $datosEstablecimiento = request()->except(['_token', '_method']);


            if ($request->hasFile('ruta_foto_principal')) {
                $establecimiento = Establecimiento::findOrFail($establecimiento_id);
                Storage::delete('public/' . $establecimiento->ruta_foto_principal);
                $datosEstablecimiento['ruta_foto_principal'] = $request->file('ruta_foto_principal')->store('uploads', 'public');
            }

            Establecimiento::where('id', '=', $establecimiento_id)->update($datosEstablecimiento);

            $establecimiento = Establecimiento::findOrFail($establecimiento_id);

            //return view('establecimiento.edit', compact('establecimiento'));
            return redirect('establecimiento')->with('mensaje', 'Establecimiento Editado');
        }
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $establecimiento_id)
    {
        if ($request->is('api/*')) {
            $establecimiento = Establecimiento::find($establecimiento_id)->delete();

            return response()->json([
                'data' => $establecimiento,
                'message' => 'Establecimiento eliminado correctamente'
            ], 200);
        } else {
            $establecimiento = Establecimiento::findOrFail($establecimiento_id);

            if (Storage::delete('public/' . $establecimiento->ruta_foto_principal)) {
                Establecimiento::destroy($establecimiento_id);
            }

            return redirect('establecimiento')->with('mensaje', 'Establecimiento borrado');
        }
    }
}
