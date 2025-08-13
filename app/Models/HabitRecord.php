<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HabitRecord extends Model
{
    protected $fillable = [
        'habit_id',
        'tracked_date',
        'completed',
    ];

    protected $casts = [
        'tracked_date' => 'date',
        'completed' => 'boolean',
    ];
    
    // Relación al hábito asociado
    public function habit(): BelongsTo
    {
        return $this->belongsTo(Habit::class);
    }

}
