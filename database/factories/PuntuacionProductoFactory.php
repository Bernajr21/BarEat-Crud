<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Producto;
use App\TipoUsuario;
use App\PuntuacionProducto;
use Faker\Generator as Faker;

$factory->define(PuntuacionProducto::class, function (Faker $faker) {
    
    $t = TipoUsuario::where('tipo', 'propietario')->pluck('id')->first();

    $u = User::whereHas('usuarios_tipo', function ($query) {$query->where('tipo_usuario_id', 2);})->get();
    

    return [
        'user_id' => $u->random()->id,
        'producto_id' => Producto::all()->random()->id,
        'puntuacion_producto' => $faker->numberBetween($min = 1, $max = 10),
        'comentario' => $faker->realText($maxNbChars = 200, $indexSize = 2),
     
    ];
});
