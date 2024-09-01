<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\BlogApiController;
use App\Http\Controllers\Api\AccountApiController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Route::apiResource('blog', BlogController::class);
Route::apiResource('blog', BlogApiController::class);
Route::apiResource('account', AccountApiController::class);

// Route::prefix('auth')->middleware('auth')->group(function () {
//     Route::post('login', [AuthenticatedSessionController::class, 'login']);
// });

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
