<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    const TIPO_1 = 'Tapa';
    const TIPO_2 = 'Ración';
    const TIPO_3 = 'Plato';
    const TIPO_4 = 'Bebida';
    const TIPO_5 = 'Postre';


    //Campos rellenables
    protected $fillable = [
        'nombre_producto', 'descripcion_producto', 'precio_producto', 'tipo_producto', 
        'puntuacion_media_producto', 'carta_id'
    ];

    //Campos ocultos
    protected $hidden = [
        'created_at', 'updated_at',
    ];


    /**RELACIONES ENTRE TABLAS */

    //Relación inversa de carta con productos
    public function carta()
    {
        return $this->belongsTo('App\Carta');
    }

    //Obtenemos las puntuaciones que tiene el producto
    public function puntuaciones_producto(){
        return $this->hasMany('App\PuntuacionProducto');
    }

    //Obtenemos los usuarios que han realizado la puntuación
    public function usuarios_puntuacion(){
        return $this->hasOneThrough('App\User', 'App\Puntuacion_Producto');
    }

    //Obtenemos las imágenes del producto
    public function imagenes(){
        return $this->hasMany('App\Imagen');
    }
}
