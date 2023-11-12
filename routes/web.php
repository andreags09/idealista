<?php

use App\Http\Controllers\CalculateScoreController;
use App\Http\Controllers\PublicListingController;
use App\Http\Controllers\QualityListingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicListingController::class, '__invoke'])->name('public-listing');
Route::get('/quality', [QualityListingController::class, '__invoke'])->name('quality-listing');
Route::get('/score', [CalculateScoreController::class, '__invoke'])->name('calculate-score');
