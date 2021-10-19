<?php

namespace App\Http\Controllers;

use App\User;
use App\Reserva;
use Illuminate\Http\Request;

class UserReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        
        $reservas = User::find($user_id)->reserva()->with('establecimiento')->get()->all();
        return $reservas;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id, $reserva_id)
    {
        //Comprobar si existe la reserva que buscamos

        //Eliminar reserva
        $reserva = User::find($user_id)->reserva()->find($reserva_id)->delete();

        return response()->json([
            'data'=>$reserva,
            'message'=>'Reserva eliminada exitosamente'], 200);
    }
}
