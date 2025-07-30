<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\GiftAssessmentController;

Route::get('/gifts', [GiftAssessmentController::class, 'form']);
Route::post('/gifts', [GiftAssessmentController::class, 'submit'])->name('gifts.submit');
