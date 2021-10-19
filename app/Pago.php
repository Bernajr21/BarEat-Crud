<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    //Campos rellenables
    protected $fillable = [
        'establecimiento_id', 'importe', 'estado', 
    ];

    //Campos ocultos
    protected $hidden = [
        'created_at', 'updated_at',
    ];


    /**RELACIONES ENTRE TABLAS */

    //Relación inversa entre establecimientos y anuncios
    public function establecimiento()
    {
        return $this->belongsTo('App\Establecimiento');
    }
}
