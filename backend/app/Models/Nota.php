<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nota extends Model
{
    use HasFactory;
    
    protected $table = 'notas';

    protected $fillable = [
        'aluno_id',
        'avaliacao_id',
        'nota',
    ];

    public function aluno(): BelongsTo
    {
        return $this->belongsTo(Aluno::class);
    }

    public function avaliacao(): BelongsTo
    {
        return $this->belongsTo(Avaliacao::class);
    }
}
