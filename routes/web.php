<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PanenController; 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/data-panen', [PanenController::class, 'index']);

Route::post('/tambah-panen', [PanenController::class, 'store']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'processRegister']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', function() {
    return view('dashboard');
})->middleware('auth');