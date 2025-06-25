<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Disciplina extends Model
{
    use HasFactory;

    protected string $table = 'disciplinas';

    protected array $fillable = [
        'nome',
        'curso_id',
        'professor_id',
        'ementa',
        'carga_horaria',
    ];

    public function curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class);
    }

    public function professor(): BelongsTo
    {
        return $this->belongsTo(Professor::class);
    }

    public function alunos(): BelongsToMany
    {
        return $this->belongsToMany(Aluno::class, 'disciplinas_alunos', 'disciplina_id', 'aluno_id');
    }
}
