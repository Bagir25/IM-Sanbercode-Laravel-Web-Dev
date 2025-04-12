<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\genrecontroller;

Route::get('/', [DashboardController::class, 'index']);
Route::get('/register', [FormController::class, 'showForm']);
Route::post('/welcome', [FormController::class, 'submitForm']);

//create data
Route::get('/genre/create', [genreController::class, 'create']);
Route::post('/genre', [genreController::class, 'store']);

//read data
Route::get('/genre', [genreController::class, 'lists']);
Route::get('/genre/{id}', [genreController::class, 'show']);

//update data
Route::get('/genre/{id}/edit', [genreController::class, 'edit']);
Route::put('/genre/{id}', [genreController::class, 'update']);

//delete data
Route::delete('/genre/{id}', [genreController::class, 'destroy']);

