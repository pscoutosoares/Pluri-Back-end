<?php

namespace App\Http\Controllers;
use App\Http\Resources\MatriculaResource;
use App\Http\Resources\MatriculaResourceCollection;
use App\Matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
     /**
     *  @param Matricula $matricula
     *  @return MatriculaResource
     */
    public function show (Matricula $matricula): MatriculaResource
    {
        return new MatriculaResource($matricula);
    }
    public function index(): MatriculaResourceCollection
    {
        return new MatriculaResourceCollection( Matricula::paginate() );
    }
    public function store(Request $request)
    {
        $request->validate([
            'aluno_id'  => 'required',
            'curso_id'  => 'required',
        ]);

        $matricula = Matricula::create($request->all());

        return new MatriculaResource($matricula);
    }
    public function update(Matricula $matricula, Request $request): MatriculaResource
    {

        $matricula->update($request->all());

        return new MatriculaResource($matricula);
    }
    public function destroy(Matricula $matricula)
    {
        $matricula->delete();

        return response()->json();
    }
}
