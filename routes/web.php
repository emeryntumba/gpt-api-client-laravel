<?php

use App\Http\Controllers\OpenAIController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/openai', [OpenAIController::class, 'index'])->name('openai.index');
Route::post('/openai', [OpenAIController::class, 'sendRequest'])->name('openai.sendRequest');
