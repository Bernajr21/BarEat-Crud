<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
    //Campos rellenables
    protected $fillable = [
        'establecimiento_id', 
    ];

    //Campos ocultos
    protected $hidden = [
        'created_at', 'updated_at',
    ];


    /**RELACIONES ENTRE TABLAS */

    //Obtenemos el establecimiento al que pertenecen las cartas
    public function establecimientos(){
        return $this->hasOne('App\Establecimiento');
    }

    //Obtenemos los productos de la carta
    public function productos(){
        return $this->hasMany('App\Producto');
    }
}
