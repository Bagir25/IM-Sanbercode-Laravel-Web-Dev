<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;

Route::get('/', [DashboardController::class, 'index']);
Route::get('/register', [FormController::class, 'showForm']);
Route::post('/welcome', [FormController::class, 'submitForm']);
