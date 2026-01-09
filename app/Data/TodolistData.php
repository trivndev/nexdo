<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class TodolistData extends Data
{
    public function __construct(
        public string $uuid,
        public string $title,
        public string $description,

    ) {}
}
