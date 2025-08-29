<?php

use App\Http\Controllers\EstudanteController;
use App\Http\Controllers\TurmaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('/turma', TurmaController::class);
Route::resource('/estudante', EstudanteController::class);
