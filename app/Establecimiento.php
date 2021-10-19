<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\EstablecimientoResource;

class Establecimiento extends Model
{
    public $resource = EstablecimientoResource::class;

    const TIPO_ESTABL_1 = 'Bar';
    const TIPO_ESTABL_2 = 'Cafetería';
    const TIPO_ESTABL_3 = 'Restaurante';
    
    //Campos rellenables
    protected $fillable = [
        'nombre_establecimiento', 'descripcion_establecimiento', 'dirección_establecimiento', 'num_telefono', 'email',
        'latitud', 'longitud', 'tipo_establecimiento', 'maximo_numero_comensales', 'aforo',
        'puntuacion_media_establecimiento', 'ruta_foto_principal', 'nif', 'es_premium', 'user_id',
    ];

    //Campos ocultos
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    /**RELACIONES ENTRE TABLAS */

    //Relación inversa entre usuarios y establecimientos
    public function usuario()
    {
        return $this->belongsTo('App\User');
    }

    //Obtenemos las reservas realizadas en el establecimiento
    public function reservas()
    {
        return $this->hasMany('App\Reserva');
    }

    //Obtenemos la carta del establecimiento
    public function carta()
    {
        return $this->hasOne('App\Carta');
    }

    //Obtenemos los productos que se ofrecen en el establecimiento
    public function productos_carta(){
        return $this->hasManyThrough('App\Producto', 'App\Carta');
    }

    //Obtenemos las puntuaciones que tiene el establecimiento
    public function puntuaciones_establecimiento(){
        return $this->hasMany('App\PuntuacionEstablecimiento');
    }

    //Obtenemos las imágenes del establecimiento
    public function imagenes(){
        return $this->hasMany('App\Imagen');
    }

    //Obtenemos los pagos realizados por el establecimiento
    public function pagos(){
        return $this->hasMany('App\Pago');
    }

    //Obtenemos los anuncios publicados por el establecimiento
    public function anuncios(){
        return $this->hasMany('App\Anuncio');
    }

}
