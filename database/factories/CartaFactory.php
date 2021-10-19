<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Carta;
use App\Establecimiento;
use Faker\Generator as Faker;

$factory->define(Carta::class, function (Faker $faker) {

    //attach para insertar id de carta en carta_id del producto????
    return [
        'establecimiento_id' => Establecimiento::all()->random()->id,
    ];
});
