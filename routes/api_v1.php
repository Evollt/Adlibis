<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\Article\ArticleController;
use App\Http\Controllers\Api\V1\Article\VideoArticleController;
use App\Http\Controllers\Api\V1\GeneralController;
use App\Http\Controllers\Api\V1\ReviewController;
use App\Http\Controllers\Api\V1\User\AuthController;
use App\Http\Controllers\Api\V1\User\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->middleware('guest')->group(
    function () {
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);
    }
);

Route::get('user', [UserController::class, 'show'])->middleware(['auth:sanctum']);

Route::get('enums', [GeneralController::class, 'enums']);

Route::resource('articles', ArticleController::class)->except(['update', 'destroy']);
Route::resource('video-articles', VideoArticleController::class)->except(['update', 'destroy']);
Route::resource('reviews', ReviewController::class);
