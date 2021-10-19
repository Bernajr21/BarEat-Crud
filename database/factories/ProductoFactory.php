<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Carta;
use App\Producto;
use Faker\Generator as Faker;

$factory->define(Producto::class, function (Faker $faker) {
   
   
    return [
        'nombre_producto' => $faker->word,
        'descripcion_producto' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'precio_producto' => $faker->numberBetween($min = 1.50, $max = 30),
        'tipo_producto' => $faker->randomElement([Producto::TIPO_1, Producto::TIPO_2,
                                                Producto::TIPO_3, Producto::TIPO_4,
                                                Producto::TIPO_5]),
        'carta_id' => Carta::all()->random()->id,
        'puntuacion_media_producto' => 10,
        'ruta_foto_principal'=> $faker->imageUrl($width = 640, $height = 480),
        'total_puntuaciones' => $faker->numberBetween($min = 5, $max = 30),

    ];
});
