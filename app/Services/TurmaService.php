<?php

namespace App\Services;

use App\Models\Turma;

class TurmaService
{

    public function store(array $data): Turma
    {
        return Turma::create($data);
    }

}