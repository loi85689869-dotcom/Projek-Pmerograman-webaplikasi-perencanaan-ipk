<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradeScale extends Model
{
    protected $fillable = [
        'nilai',
        'bobot',
        'nilai_min',
        'nilai_max',
    ];

    protected $casts = [
        'bobot' => 'decimal:2',
        'nilai_min' => 'decimal:2',
        'nilai_max' => 'decimal:2',
    ];
}