<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('/aluno', 'AlunoController');
Route::get('/aluno/search/{nome}/{email}', 'AlunoController@searchByEmailAndName');
Route::get('/stats', 'AlunoController@totalStudentsBySexAndCourse');
Route::apiResource('/curso', 'CursoController');
Route::apiResource('/matricula', 'MatriculaController');

