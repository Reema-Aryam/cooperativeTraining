<?php

namespace App\Http\Controllers;

use App\Actions\ChatbotAnswerer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function __invoke(Request $request, ChatbotAnswerer $answerer): JsonResponse
    {
        $validated = $request->validate([
            'question' => ['required', 'string', 'min:3', 'max:500'],
        ]);

        return response()->json([
            'answers' => $answerer->answer($validated['question']),
            'fallback' => 'لا أملك إجابة مؤكدة لهذا السؤال في المعلومات المعتمدة. راجع خطاب القبول أو تواصل مع مشرف التدريب.',
        ]);
    }
}
