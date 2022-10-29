<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/add-task', [App\Http\Controllers\HomeController::class, 'add_task'])->name('add_task');
Route::delete('/delete-task/{id}', [App\Http\Controllers\HomeController::class, 'delete_task'])->name('delete_task');

Route::get('/task/{id}', [TaskController::class, 'index'])->name('task.single');

Route::get('/task/{id}/create', [TaskController::class, 'create'])->name('task.create');
Route::post('/task/{id}/store', [TaskController::class, 'store'])->name('task.store');

Route::get('/task/{id}/edit', [TaskController::class, 'edit'])->name('task.edit');
Route::put('/task/{id}/update', [TaskController::class, 'update'])->name('task.update');

Route::delete('/task/{id}/destroy', [TaskController::class, 'destroy'])->name('task.destroy');
