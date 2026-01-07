<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodolistStatus extends Model
{
    /** @use HasFactory<\Database\Factories\TodolistStatusFactory> */
    use HasFactory;

    public $timestamps = false;
}
