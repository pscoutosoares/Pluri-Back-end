<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Matricula;
use Faker\Generator as Faker;


$factory->define(Matricula::class, function (Faker $faker) {
    $alunos = App\Aluno::all()->pluck('id')->toArray();
    $cursos = App\Curso::all()->pluck('id')->toArray();
    return [
        'aluno_id' => $faker->randomElement($alunos),
        'curso_id' => $faker->randomElement($cursos),
    ];
});
