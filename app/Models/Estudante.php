<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    use HasFactory;

    protected $fillable = ['matricula', 'nome_completo', 'data_nascimento', 'telefone_responsavel', 'turma_id'];

    public function turma()
    {
        $this->belongsTo(Turma::class);
    }
}
