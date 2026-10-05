<?php

namespace App\Actions;

use App\Models\ChatbotKnowledge;
use Illuminate\Support\Collection;

class ChatbotAnswerer
{
    public function answer(string $question): Collection
    {
        $normalized = $this->normalize($question);

        if ($normalized === '') {
            return collect();
        }

        return ChatbotKnowledge::query()
            ->where('is_active', true)
            ->get()
            ->map(function (ChatbotKnowledge $item) use ($normalized): array {
                $score = 0;

                foreach ($item->triggers ?? [] as $trigger) {
                    $needle = $this->normalize($trigger);

                    if ($needle !== '' && str_contains(" {$normalized} ", " {$needle} ")) {
                        $score = max($score, mb_strlen($needle));
                    }
                }

                return ['item' => $item, 'score' => $score];
            })
            ->filter(fn (array $match): bool => $match['score'] > 0)
            ->sortByDesc('score')
            ->take(2)
            ->values()
            ->map(fn (array $match): array => [
                'category' => $match['item']->category,
                'answer' => $match['item']->answer,
                'source' => $match['item']->source_date ? [
                    'date' => $match['item']->source_date->format('Y-m-d'),
                    'message_id' => $match['item']->source_message_id,
                ] : null,
            ]);
    }

    private function normalize(string $value): string
    {
        $value = mb_strtolower($value, 'UTF-8');
        $value = strtr($value, [
            'أ' => 'ا', 'إ' => 'ا', 'آ' => 'ا', 'ى' => 'ي', 'ة' => 'ه', 'ـ' => '',
        ]);
        $value = preg_replace('/[\x{064B}-\x{065F}\x{0670}]/u', '', $value);
        $value = preg_replace('/[^\p{L}\p{N}]+/u', ' ', $value);

        return trim(preg_replace('/\s+/u', ' ', $value));
    }
}
