<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HabitController;

use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});


// Routes Auth
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');


Route::get('/habits', [HabitController::class, 'index'])->name('habit.list');

// Middlewares
Route::middleware('auth:sanctum')->get('/dashboard', function () {
    return view('dashboard');
});
