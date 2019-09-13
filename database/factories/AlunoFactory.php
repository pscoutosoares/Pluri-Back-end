<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Aluno;
use Faker\Generator as Faker;

$factory->define(Aluno::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male', 'female']);

    return [
        'nome' => $faker->name,
        'email' => $faker->email,
        'sexo' => $gender,
        'dataNascimento' => $faker->dateTimeBetween('1990-01-01', '2012-12-31')
        ->format('d/m/Y'),
    ];
});
