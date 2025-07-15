<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestQueueController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-job', [TestQueueController::class, 'dispatchSlowJob']);
