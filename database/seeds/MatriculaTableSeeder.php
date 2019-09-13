<?php

use Illuminate\Database\Seeder;
use App\Matricula;
class MatriculaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Matricula::class, 50 )->create();
    }
}
