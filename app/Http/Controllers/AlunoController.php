<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlunoResource;
use App\Http\Resources\AlunoResourceCollection;
use DB;
use App\Aluno;

use Illuminate\Http\Request;
class AlunoController extends Controller
{
    /**
     *  @param Aluno $aluno
     *  @return AlunoResource
     */
    public function show(Aluno $aluno): AlunoResource
    {
        return new AlunoResource($aluno);
    }
    public function index(): AlunoResourceCollection
    {
        return new AlunoResourceCollection( Aluno::paginate() );
    }
    public function store(Request $request)
    {
        $request->validate([
            'nome'              => 'required',
            'email'             => 'required',
            'dataNascimento'    => 'required',
        ]);

        $aluno = Aluno::create($request->all());

        return new AlunoResource($aluno);
    }
    public function update(Aluno $aluno, Request $request): AlunoResource
    {
        $aluno->update($request->all());

        return new AlunoResource($aluno);
    }
    public function destroy(Aluno $aluno)
    {
        $aluno->delete();

        return response()->json();
    }

    public function searchByEmailAndName($nome,$email)
    {
        $aluno = DB::table('alunos')
        ->where('nome',$nome)
        ->where('email',$email)
        ->get();
        return response()->json( $aluno);
    }

    public function totalStudentsBySexAndCourse()
    {
        $aluno = DB::table('matriculas')
        ->join('alunos', 'matriculas.aluno_id', '=', 'alunos.id')
        ->join('cursos', 'matriculas.curso_id', '=', 'cursos.id')
        ->orderBy('titulo')
        ->orderBy('sexo')
        ->orderBy('dataNascimento')
        ->get();

        $aluno->toArray();


        //return response()->json($aluno);
    }

    private function dateToAge($date)
    {
        $date = new DateTime($date);
        $interval = $date->diff( new DateTime( date('Y-m-d') ) );
        return int($interval->format( '%Y' ));
    }
}
