<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TodolistItem extends Model
{
    /** @use HasFactory<\Database\Factories\TodolistItemFactory> */
    use HasFactory;

    public function group(): BelongsTo
    {
        return $this->belongsTo(TodolistGroup::class);
    }

    public function priority(): BelongsTo
    {
        return $this->belongsTo(TodolistPriority::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(TodolistStatus::class);
    }
}
