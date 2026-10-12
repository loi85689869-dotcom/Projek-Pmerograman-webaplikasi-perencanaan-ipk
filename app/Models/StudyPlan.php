<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudyPlan extends Model
{
    protected $fillable = [
        'user_id',
        'course_name',
        'difficulty',
        'day',
        'start_time',
        'end_time',
        'is_completed',
    ];

            protected $casts = [
            'is_completed' => 'boolean',
        ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
