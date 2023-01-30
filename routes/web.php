<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;



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
    Route::put('/tickets/{ticket}', 'update')->name('update');
    Route::delete('/tickets/{ticket}', 'delete')->name('delete');
    Route::get('/tickets/{ticket}/edit', 'edit')->name('edit');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
