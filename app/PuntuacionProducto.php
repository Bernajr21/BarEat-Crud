<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PuntuacionProducto extends Model
{
    //Campos rellenables
    protected $fillable = [
        'user_id','producto_id', 'puntuacion_producto', 'comentario',
    ];

    //Campos ocultos
    protected $hidden = [
        'created_at', 'updated_at',
    ];


    /**RELACIONES ENTRE TABLAS */

    //Relación inversa de usuarios con puntuaciones de los productos
    public function usuario()
    {
        return $this->belongsTo('App\User');
    }

    //Relación inversa de productos con puntuaciones de los productos
    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }

    
}
