<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrainingApplication extends Model
{
    protected $fillable = [
        'user_id', 'reference_number', 'national_id', 'student_id', 'arabic_name',
        'first_name', 'middle_name', 'grandfather_name', 'last_name', 'gender',
        'mobile', 'email', 'supervisor_name', 'supervisor_email', 'training_preference',
        'training_type', 'country', 'university', 'degree', 'degree_major',
        'training_start_date', 'training_end_date', 'note', 'status', 'reviewed_by',
        'reviewed_at', 'decision_note',
    ];

    protected function casts(): array
    {
        return ['training_start_date' => 'date', 'training_end_date' => 'date', 'reviewed_at' => 'datetime'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }
}
