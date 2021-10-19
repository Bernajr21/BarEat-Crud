<?php

namespace App\Http\Resources;

use App\Http\Resources\BaseResource;

class EstablecimientoResource extends BaseResource
{
    public function generateLinks($request)
    {
        return [
            [
                'rel' => 'self',
                'href' => route('establecimientos.show', $this->id),
            ],
            [
                'rel' => 'establecimiento.imagenes',
                'href' => route('establecimiento.imagenes.index', $this->id),
            ],
            [
                'rel' => 'establecimiento.puntuaciones',
                'href' => route('establecimiento.puntuaciones.index', $this->id),
            ],
            [
                'rel' => 'establecimiento.productos',
                'href' => route('establecimiento.productos.index', $this->id),
            ],
            [
                'rel' => 'establecimiento.reservas',
                'href' => route('establecimiento.reservas.index', $this->id),
            ],
            [
                'rel' => 'carta',
                'href' => route('carta.show', $this->id),
            ],
        ];
    }
}
