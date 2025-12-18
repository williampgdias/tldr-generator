<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SummarizerController extends Controller
{
    public function index()
    {
        return view('summarizer.index');
    }

    public function summarize(Request $request)
    {
        $request->validate([
            'text' => 'required|string|min:50|max:5000',
        ]);

        $content = $request->input('text');

        $apiKey = env('GEMINI_API_KEY');
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key={$apiKey}";

        $systemInstruction = "You are an expert summarizer. Extract key points. Return ONLY a bulleted list (Markdown). Keep it concise.";

        $payload = [
            "system_instruction" => [
                "parts" => [["text" => $systemInstruction]]
            ],
            "contents" => [
                [
                    "parts" => [["text" => $content]]
                ]
            ]
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post($url, $payload);

        $result = $response->json();

        if (isset($result['candidates'][0]['content']['parts'][0]['text'])) {
            $summary = $result['candidates'][0]['content']['parts'][0]['text'];
        } else {
            $summary = "Error: AI could not reply. DEtails: " . json_encode($result['error'] ?? 'Unknown error');
        }

        return response()->json([
            'summary' => $summary
        ]);
    }
}
