<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;
    protected $fillable = ['codigo'];

    public function estudantes()
    {
        $this->hasMany(Estudante::class);
    }
}
