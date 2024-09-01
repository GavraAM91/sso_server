<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogApiController;

Route::as('blog.')->prefix('blog')->group(function () {
    Route::get('', [BlogApiController::class, 'index'])->name('index');
    Route::post('store', [BlogApiController::class, 'store'])->name('store');
});

