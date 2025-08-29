<?php

namespace App\Services;

use App\Models\Estudante;

class EstudanteService
{

    public function list(): array
    {
        return Estudante::all()->toArray();
    }

}