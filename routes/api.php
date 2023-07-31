<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\TaskController;

Route::group(['prefix' => 'v1'], function () {
    Route::resource('tasks', TaskController::class)
        ->only([
            'index',
            'store',
            'show',
            'update',
        ]);
});
