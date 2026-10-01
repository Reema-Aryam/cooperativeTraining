<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('training_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('reference_number')->unique();
            $table->string('national_id', 30);
            $table->string('student_id', 50);
            $table->string('arabic_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('grandfather_name');
            $table->string('last_name');
            $table->string('gender', 20);
            $table->string('mobile', 30);
            $table->string('email');
            $table->string('supervisor_name');
            $table->string('supervisor_email');
            $table->string('training_preference', 20);
            $table->string('training_type', 50);
            $table->string('country', 100)->default('saudi_arabia');
            $table->string('university', 100);
            $table->string('degree', 50);
            $table->string('degree_major', 100);
            $table->date('training_start_date');
            $table->date('training_end_date');
            $table->text('note')->nullable();
            $table->string('status', 30)->default('under_review')->index();
            $table->foreignId('reviewed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('reviewed_at')->nullable();
            $table->text('decision_note')->nullable();
            $table->timestamps();
            $table->index(['user_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('training_applications');
    }
};
