<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends \Spatie\Tags\Tag
{
    public function todolist(): MorphToMany
    {
        return $this->morphToMany(TodolistGroup::class, 'taggable');
    }
}
