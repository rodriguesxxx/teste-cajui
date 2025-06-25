<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisciplinaAluno extends Model
{
    use HasFactory;
    
    protected $table = 'disciplinas_alunos';

    protected $fillable = [
        'disciplina_id',
        'aluno_id',
        'data_inicio',
        'data_fim',
        'is_aprovado'
    ];

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class, 'disciplina_id');
    }

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'aluno_id');
    }
}
