<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Imagen;
use App\Producto;
use App\Establecimiento;
use Faker\Generator as Faker;

$factory->define(Imagen::class, function (Faker $faker) {


    return [
        'ruta_imagen' => $faker->imageUrl($width = 640, $height = 480),
        'descripcion_imagen' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'ancho' => 300,
        'alto' => 300,
        'establecimiento_id' => Establecimiento::all()->random()->id,
        'producto_id' => Producto::all()->random()->id,
        //'anuncio_id' => Establecimiento::all()->random()->id,
        'user_id' => User::all()->random()->id,
    ];
});
