<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quarto extends Model
{
    /** @use HasFactory<\Database\Factories\QuartoFactory> */
    use HasFactory;
    protected $fillable = ['disponivel'];
}
