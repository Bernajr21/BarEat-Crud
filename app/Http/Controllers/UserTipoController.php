<?php

namespace App\Http\Controllers;

use App\User;
use App\TipoUsuario;
use App\UsuarioTipo;
use Illuminate\Http\Request;

class UserTipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::find($id);
        $user_tipo = $user->usuarios_tipo()->get();

        return [
            'Usuario' => $user,
            'Tipo de usuario' => $user_tipo];
    }

}
