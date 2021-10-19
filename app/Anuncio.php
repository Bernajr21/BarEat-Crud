<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    //Campos rellenables
    protected $fillable = [
        'titulo_anuncio', 'descripcion_anuncio', 'establecimiento_id', 
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

    //Obtenemos las imágenes del anuncio
    public function imagenes(){
        return $this->hasMany('App\Imagenes');
    }
}
