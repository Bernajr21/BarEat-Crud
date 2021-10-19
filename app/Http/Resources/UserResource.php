<?php

namespace App\Http\Resources;

use App\Http\Resources\BaseResource;

class UserResource extends BaseResource
{
    public function generateLinks($request)
    {
        return [
            [
                'rel' => 'self',
                'href' => route('usuarios.show', $this->id),
            ],
            [
                'rel' => 'usuarios.tipos',
                'href' => route('usuarios.tipos.index', $this->id),
            ],
            [
                'rel' => 'usuario.reservas',
                'href' => route('usuario.reservas.index', $this->id),
            ],
            /*[
                'rel' => 'establecimiento.usuario',
                'href' => route('establecimiento.usuario.index', $this->id),
            ],*/
        ];
    }
}
