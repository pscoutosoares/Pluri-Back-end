<?php

namespace App\Http\Controllers;
use App\Http\Resources\CursoResource;
use App\Http\Resources\CursoResourceCollection;
use App\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     *  @param Curso $curso
     *  @return CursoResource
     */
    public function show (Curso $curso): CursoResource
    {
        return new CursoResource($curso);
    }
    public function index(): CursoResourceCollection
    {
        return new CursoResourceCollection( Curso::paginate() );
    }
    public function store(Request $request)
    {
        $request->validate([
            'titulo'    => 'required',
        ]);

        $curso = Curso::create($request->all());

        return new CursoResource($curso);
    }
    public function update(Curso $curso, Request $request): CursoResource
    {
        $curso->update($request->all());

        return new CursoResource($aluno);
    }
    public function destroy(Curso $curso)
    {
        $curso->delete();

        return response()->json();
    }
}
