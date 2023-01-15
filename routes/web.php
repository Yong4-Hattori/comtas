<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;  

Route::get('/', [TaskController::class, 'index']); 
Route::get('/tasks/create', [TaskController::class, 'create']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::put('/tasks/{task}', [TaskController::class, 'update']);
Route::get('/tasks/{task}', [TaskController::class ,'show']);
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit']);
Route::delete('/tasks/{task}', [TaskController::class,'deleteTask']);