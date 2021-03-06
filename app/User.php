<?php

namespace App;

use App\Helpers\Token;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;   


class User extends Authenticatable
{
    use Notifiable;


    public $resource = UserResource::class;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'apellidos', 'email', 'num_telefono', 'fecha_nacimiento', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //AUTORIZACIÓN
    public static function by_field($key, $value)
    {
        $users = self::where($key, $value)->get();

        foreach ($users as $key => $user)
        {
            return $user;
        }
    }
    
    public function is_authorized(Request $request)
    {
        $token = new Token();
        $header_authorization = $request->header('Authorization');

        if (!isset($header_authorization))
        {
            return false;
        }

        $data = $token->decode($header_authorization);
        return !empty(self::by_field('email', $data->email));
    }


    /**RELACIONES ENTRE TABLAS */

    //Relacionamos al usuario con su tipo de usuario
    public function usuarios_tipo()
    {
        return $this->belongsToMany('App\TipoUsuario', 'usuario_tipos', 'user_id', 'tipo_usuario_id');
    }

    //Relacionamos la tabla usuarios con la tabla establecimientos
    public function establecimientos()
    {
        return $this->hasMany('App\Establecimiento');
    }

    //Relacionamos la tabla usuarios con la tabla reservas
    public function reserva()
    {
        return $this->hasMany('App\Reserva');
    }

    //Relación usuario - puntuaciones de los establecimientos
    public function puntuacion_establecimientos(){
        return $this->hasMany('App\PuntuacionEstablecimiento');
    }

    //Relación usuario - puntuaciones de los productos
    public function puntuacion_productos(){
        return $this->hasMany('App\PuntuacionProducto');
    }

    //Obtenemos las imágenes del usuario
    public function imagenes(){
        return $this->hasMany('App\Imagen');
    }

    //Para añadirle la imagen a los usuarios

    public function adminlte_image(){
        return 'https://images.pexels.com/photos/4676640/pexels-photo-4676640.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260';
    }

    public function adminlte_desc(){
        return "Administrador";
    }

    public function adminlte_profile_url(){
        return '#';
    }
}
