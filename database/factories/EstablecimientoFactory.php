<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\TipoUsuario;
use App\Establecimiento;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Builder;

$factory->define(Establecimiento::class, function (Faker $faker) {

    $t = TipoUsuario::where('tipo', 'propietario')->pluck('id')->first();

    $u = User::whereHas('usuarios_tipo', function ($query) {$query->where('tipo_usuario_id', 2);})->get();
    //dd($t);


    return [
        'nombre_establecimiento' => $faker->company(),
        'descripcion_establecimiento' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'dirección_establecimiento' => $faker->address(),
        'num_telefono' => 953600478,
        'email' => $faker->unique()->safeEmail,
        'latitud' => $faker->latitude($min = -90, $max = 90),
        'longitud' => $faker->longitude($min = -180, $max = 180),
        'tipo_establecimiento' => $faker->randomElement([Establecimiento::TIPO_ESTABL_1,
                                Establecimiento::TIPO_ESTABL_2, Establecimiento::TIPO_ESTABL_3]),
        'nif' => Str::random(10),
        'maximo_numero_comensales' => $faker->numberBetween($min = 50, $max = 100),
        'aforo' => $faker->numberBetween($min = 20, $max = 100),
        'ruta_foto_principal' => $faker->imageUrl($width = 640, $height = 480),
        'puntuacion_media_establecimiento' => $faker->numberBetween($min = 4, $max = 10),
        'user_id' => $u->random()->id, //solo aquellos que sean de tipo propietarios
        //'es_premium' => $faker->randomElement([0, 1]),
        'total_puntuaciones' => $faker->numberBetween($min = 5, $max = 30),

    ];
});
