<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Tags\HasTags;

class Todolist extends Model
{
    /** @use HasFactory<\Database\Factories\TodolistFactory> */
    use HasFactory, HasTags;

    public function status():BelongsTo
    {
        return $this->belongsTo(TodolistStatus::class);
    }

    public function priority(): BelongsTo
    {
        return $this->belongsTo(TodolistPriority::class);
    }

    public function urgency(): BelongsTo
    {
        return $this->belongsTo(TodolistUrgency::class);
    }
}
