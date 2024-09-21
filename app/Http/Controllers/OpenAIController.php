<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OpenAIService;

class OpenAIController extends Controller
{
    protected $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }

    public function index()
    {
        return view('openai-form');
    }

    public function sendRequest(Request $request)
    {
        $messages = [
            [
                'role' => 'system',
                'content' => 'You are a helpful assistant.',
            ],
            [
                'role' => 'user',
                'content' => $request->input('prompt'),
            ]
        ];

        $completion = $this->openAIService->getCompletion($messages);

        if ($completion) {
            return view('openai-result', ['response' => $completion]);
        } else {
            // Affiche la réponse complète pour le débogage
            dd($this->openAIService->getCompletion($messages));
        }
    }

}
