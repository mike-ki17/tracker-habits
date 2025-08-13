<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'frequency',
        'is_active',
    ];

    // Relación al usuario dueño del hábito
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relación a los registros diarios
    public function records(): HasMany
    {
        return $this->hasMany(HabitRecord::class);
    }
}
