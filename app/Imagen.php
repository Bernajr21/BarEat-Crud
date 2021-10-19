<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    //Campos rellenables
    protected $fillable = [
        'ruta_imagen', 'descripcion_imagen', 'ancho', 'alto', 'establecimiento_id',
        'producto_id', 'anuncio_id', 'user_id',
    ];

    //Campos ocultos
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $table = 'imagenes';


    /**RELACIONES ENTRE TABLAS */

    //Relación inversa entre establecimientos e imágenes
    public function establecimiento()
    {
        return $this->belongsTo('App\Establecimiento');
    }

    //Relación inversa entre productos e imágenes
    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }

    //Relación inversa entre anuncios e imágenes
    public function anuncio()
    {
        return $this->belongsTo('App\Anuncio');
    }

    //Relación inversa entre usuarios e imágenes
    public function usuario()
    {
        return $this->belongsTo('App\User');
    }
}
