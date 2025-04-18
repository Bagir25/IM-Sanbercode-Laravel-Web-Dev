<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\genrecontroller;
use App\Http\Controllers\booksController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\commetsController;
use App\Http\Middleware\isadmin;

Route::get('/', [DashboardController::class, 'index']);
Route::get('/register', [FormController::class, 'showForm']);
Route::post('/welcome', [FormController::class, 'submitForm']);

Route::middleware(isadmin::class)->group(function () {

    
    
    //create data
    Route::get('/genre/create', [genreController::class, 'create']);
    Route::post('/genre', [genreController::class, 'store']);
    
    //update data
    Route::get('/genre/{id}/edit', [genreController::class, 'edit']);
    Route::put('/genre/{id}', [genreController::class, 'update']);
    
    //delete data
    Route::delete('/genre/{id}', [genreController::class, 'destroy']);
});

//read data
Route::get('/genre', [genreController::class, 'lists']);
Route::get('/genre/{id}', [genreController::class, 'show']);


//CRUD books
Route::resource("books",booksController::class);

//auth
//register
Route::get('/register', [AuthController::class, 'showregister']);
Route::post('/register', [AuthController::class, 'register']);

//login
Route::get('/login', [AuthController::class, 'showlogin']);
Route::post('/login', [AuthController::class, 'login'])-> name("login");

//logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware("auth");

//profile
Route::get('/profile', [AuthController::class, 'getprofile'])->middleware("auth");
Route::post('/profile', [AuthController::class, 'createprofile'])->middleware("auth");
Route::put('/profile/{id}', [AuthController::class, 'updateprofile'])->middleware("auth");

//commets
Route::post('/commets/{books_id}', [commetsController::class, 'comment'])->middleware("auth");