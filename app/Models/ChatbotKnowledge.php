<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatbotKnowledge extends Model
{
    protected $table = 'chatbot_knowledge';

    protected $fillable = [
        'slug', 'category', 'question', 'answer', 'triggers',
        'source_file', 'source_message_id', 'source_date', 'is_active',
    ];

    protected function casts(): array
    {
        return [
            'triggers' => 'array',
            'source_date' => 'date',
            'is_active' => 'boolean',
        ];
    }
}
