<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiProductController;
use App\Http\Controllers\UserController;
use App\Models\Task;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('products', [ApiProductController::class, 'index']);
    Route::post('products', [ApiProductController::class, 'store']);
    Route::get('/tasks', function () {
    return Task::all();
    });
});
Route::get('/debug-tasks', function () {
    return Task::all();
    });
Route::post('login', [UserController::class, 'index'])->name('login');
