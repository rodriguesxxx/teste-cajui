<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Aluno extends Model
{
    use HasFactory;
    
    protected $table = 'alunos';

    protected $fillable = [
        'user_id',
        'matricula',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function notas(): HasMany
    {
        return $this->hasMany(Nota::class);
    }

    public function disciplinas()
    {
        return $this->belongsToMany(Disciplina::class, 'disciplinas_alunos', 'aluno_id', 'disciplina_id');
    }

    public function nota_avaliacao(int $avaliacao_id): Nota|null
    {
        return $this->notas()->where('avaliacao_id', $avaliacao_id)->first();
    }
}
