<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SemesterIpkEntry extends Model
{
    protected $table = 'semester_ipk_entries';

    protected $fillable = [
        'user_id',
        'semester',
        'ip',
        'total_sks',
    ];

    protected $casts = [
        'ip' => 'decimal:2',
        'total_sks' => 'integer',
        'semester' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
