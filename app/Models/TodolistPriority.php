<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TodolistPriority extends Model
{
    /** @use HasFactory<\Database\Factories\TodolistPriorityFactory> */
    use HasFactory;

    public $timestamps = false;

    public function todolistItems(): HasMany
    {
        return $this->hasMany(TodolistItem::class);
    }
}
