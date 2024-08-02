<?php

use App\Http\Controllers\ProjetController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// route projcets
Route::get('/projects',[ProjetController::class,'index'])->name("index.project");
Route::get('/projects/create',[ProjetController::class,'create'])->name("create.project");
Route::post('/projects/store',[ProjetController::class,'store'])->name("store.project");
Route::delete('/projects/{id}',[ProjetController::class,'destroy'])->name("destroy.project");
Route::get('/projects/{id}',[ProjetController::class, 'show'])->name("show.project");
Route::get('/projects/{id}/edit',[ProjetController::class, 'edit'])->name("edit.project");
Route::put('/projects/{id}',[ProjetController::class, 'update'])->name("update.project");

// route tasks
Route::get('/tasks',[TasksController::class,'index']);
Route::get('/tasks/create',[TasksController::class,'create'])->name("create.task");
Route::post('/tasks/store',[TasksController::class,'store'])->name("store.task");
Route::delete('/tasks/{id}',[TasksController::class,'destroy'])->name("destroy.task");
Route::get('/tasks/{id}/edit',[TasksController::class,'edit'])->name("edit.task");
Route::put('/tasks/{id}',[TasksController::class, 'update'])->name("update.task");

Route::get('/',[WelcomeController::class,'index']);
Route::get('/filter',[ProjetController::class,'filter'])->name('filterByTask.project');

