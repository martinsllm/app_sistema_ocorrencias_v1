<?php

namespace App\Services;

use App\Models\Turma;

class TurmaService
{
    public function list(): array
    {
        return Turma::all()->toArray();
    }

    public function findByPk($id): Turma
    {
        return Turma::find($id);
    }

    public function store(array $data): Turma
    {
        return Turma::create($data);
    }

}