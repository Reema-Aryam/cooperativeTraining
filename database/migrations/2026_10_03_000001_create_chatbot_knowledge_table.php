<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chatbot_knowledge', function (Blueprint $table): void {
            $table->id();
            $table->string('slug')->unique();
            $table->string('category');
            $table->string('question');
            $table->text('answer');
            $table->json('triggers');
            $table->string('source_file')->nullable();
            $table->string('source_message_id')->nullable();
            $table->date('source_date')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chatbot_knowledge');
    }
};
