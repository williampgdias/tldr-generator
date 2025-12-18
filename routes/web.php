<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SummarizerController;

Route::get('/', [SummarizerController::class, 'index']);
Route::post('/summarize', [SummarizerController::class, 'sumarize'])->name('summarize');
