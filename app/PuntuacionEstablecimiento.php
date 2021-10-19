<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PuntuacionEstablecimiento extends Model
{
    //Campos rellenables
    protected $fillable = [
        'user_id','establecimiento_id', 'puntuacion_establecimiento', 'comentario',
    ];

    //Campos ocultos
    protected $hidden = [
        'created_at', 'updated_at',
    ];


    /**RELACIONES ENTRE TABLAS */

    //Relación inversa de usuarios con puntuaciones de los establecimientos
    public function usuario()
    {
        return $this->belongsTo('App\User');
    }
    
    //Relación inversa de establecimientos con puntuaciones de los establecimientos
    public function establecimiento()
    {
        return $this->belongsTo('App\Establecimiento');
    }

}
