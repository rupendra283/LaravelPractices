<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/todos', [App\Http\Controllers\TaskController::class, 'index'])->name('todo.index');
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/todos/create', [App\Http\Controllers\TaskController::class, 'create'])->name('todo.create');
    Route::post('/todos/strore', [App\Http\Controllers\TaskController::class, 'store'])->name('todo.store');
    Route::get('/todos/edit/{id}', [App\Http\Controllers\TaskController::class, 'edit'])->name('todo.edit');
    Route::post('/todos/update/{id}', [App\Http\Controllers\TaskController::class, 'update'])->name('todo.update');
    Route::get('/todos/delete/{id}', [App\Http\Controllers\TaskController::class, 'delete'])->name('todo.delete');
    Route::get('/todos/status/{id}', [App\Http\Controllers\TaskController::class, 'status'])->name('todo.status');
});
