<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenAIService
{
    protected $apiUrl = 'https://api.openai.com/v1/chat/completions';
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.openai.key');
    }

    public function getCompletion($messages)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type' => 'application/json',
        ])->withoutVerifying()->post($this->apiUrl, [
            'model' => 'gpt-4o-mini',
            'messages' => $messages,
        ]);

        if ($response->failed()) {
            return [
                'error' => $response->json(),
                'status' => $response->status(),
            ];
        }

        return $response->json('choices.0.message.content');
    }


}
