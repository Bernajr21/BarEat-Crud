<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\TipoUsuario;
use App\Establecimiento;
use Faker\Generator as Faker;
use App\PuntuacionEstablecimiento;

$factory->define(PuntuacionEstablecimiento::class, function (Faker $faker) {

    $t = TipoUsuario::where('tipo', 'propietario')->pluck('id')->first();

    $u = User::whereHas('usuarios_tipo', function ($query) {$query->where('tipo_usuario_id', 2);})->get();
    

    return [
        'user_id' => $u->random()->id,
        'establecimiento_id' => Establecimiento::all()->random()->id,
        'puntuacion_establecimiento' => $faker->numberBetween($min = 1, $max = 10),
        'comentario' => $faker->realText($maxNbChars = 200, $indexSize = 2),
     
    ];
});
