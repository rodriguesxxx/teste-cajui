<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Avaliacao extends Model
{
    use HasFactory;
    
    protected $table = 'avaliacoes';

    protected $fillable = [
        'titulo',
        'disciplina_id',
        'data',
    ];

    public function disciplina(): BelongsTo
    {
        return $this->belongsTo(Disciplina::class);
    }

    public function notas(): HasMany
    {
        return $this->hasMany(Nota::class);
    }
}
