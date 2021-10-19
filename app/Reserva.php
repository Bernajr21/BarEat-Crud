<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    //Campos rellenables
    protected $fillable = [
        'user_id', 'establecimiento_id', 'num_comensales', 'fecha', 'hora',
    ];

    //Campos ocultos
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    /**RELACIONES ENTRE TABLAS */
    
    //Relación inversa de usuarios y reservas
    public function usuario()
    {
        return $this->belongsTo('App\User');
    }

    //Relación inversa de establecimientos y reservas
    public function establecimiento()
    {
        return $this->belongsTo('App\Establecimiento');
    }

}
