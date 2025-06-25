<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisciplinaAluno extends Model
{
    use HasFactory;
    
    protected string $table = 'disciplinas_alunos';

    protected array $fillable = [
        'aluno_id',
        'avaliacao_id',
        'nota',
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
