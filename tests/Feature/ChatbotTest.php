<?php

namespace Tests\Feature;

use Database\Seeders\ChatbotKnowledgeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ChatbotTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_get_a_sourced_answer_about_supervisors(): void
    {
        $this->seed(ChatbotKnowledgeSeeder::class);

        $this->postJson(route('chatbot.ask'), ['question' => 'أين أجد بيانات المشرفين؟'])
            ->assertOk()
            ->assertJsonPath('answers.0.category', 'المشرفون')
            ->assertJsonPath('answers.0.source.message_id', 'message17226');
    }

    public function test_unrelated_question_does_not_get_an_invented_answer(): void
    {
        $this->seed(ChatbotKnowledgeSeeder::class);

        $this->postJson(route('chatbot.ask'), ['question' => 'ما حالة طلبي الآن؟'])
            ->assertOk()
            ->assertJsonCount(0, 'answers');
    }

    public function test_question_length_is_limited_on_public_endpoint(): void
    {
        $this->postJson(route('chatbot.ask'), ['question' => str_repeat('س', 501)])
            ->assertUnprocessable()
            ->assertJsonValidationErrors('question');
    }
}
