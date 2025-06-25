<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Professor extends Model
{
    use HasFactory;
    
    protected $table = 'professores';

    protected $fillable = [
        'user_id',
        'siape',
    ];

    public function disciplinas(): HasMany
    {
        return $this->hasMany(Disciplina::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
