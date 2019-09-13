<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlunoResource;
use App\Http\Resources\AlunoResourceCollection;

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
}
