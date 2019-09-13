<?php

use Illuminate\Database\Seeder;
use App\Aluno;

class AlunoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Aluno::class, 50 )->create();
    }
}
