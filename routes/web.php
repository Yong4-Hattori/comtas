<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\TaskUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LineRegistrationController;



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(TaskController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/tasks', 'store')->name('store');
    Route::get('/tasks/create', 'create')->name('create');
    Route::get('/tasks/{task}', 'show')->name('show');
    Route::put('/tasks/{task}', 'update')->name('update');
    Route::delete('/tasks/{task}', 'delete')->name('delete');
    Route::get('/tasks/{task}/edit', 'edit')->name('edit');
});

Route::controller(TicketController::class)->middleware(['auth'])->group(function(){
    Route::get('/tickets', 'index')->name('index');
    Route::post('/tickets', 'store')->name('store');
    Route::get('/tickets/create', 'create')->name('create');
    Route::get('/tickets/{ticket}', 'show')->name('show');
    Route::get('/tickets/{done}', 'show')->name('showDones'); //使用済の詳細を表示
    Route::put('/tickets/{ticket}', 'update')->name('update');
    Route::delete('/tickets/{ticket}', 'delete')->name('delete');
    Route::get('/tickets/{ticket}/edit', 'edit')->name('edit');
});

Route::controller(TimelineController::class)->middleware(['auth'])->group(function(){
    Route::get('/timelines','index')->name('index');
    
    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// LINE メッセージ受信
Route::post('/line/webhook', [LineRegistrationController::class,'webhook'])->name('line.webhook');
// LINE メッセージ送信用
Route::get('/line/message/{task}', [LineRegistrationController::class,'message']);


require __DIR__.'/auth.php';
