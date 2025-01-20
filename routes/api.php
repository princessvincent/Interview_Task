<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('tasks')->group(function () {
    Route::post('create', [TaskController::class, 'createTask']);
    Route::post('update/{id}', [TaskController::class, 'updateTask']);
    Route::delete('delete/{id}', [TaskController::class, 'deleteTask']);
    Route::get('list', [TaskController::class, 'listTasks']);
});
