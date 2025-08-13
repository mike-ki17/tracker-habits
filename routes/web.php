<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register.form');

Route::post('/register', [LoginController::class, 'register'])->name('register');

Route::middleware('auth:sanctum')->get('/dashboard', function () {
    return view('dashboard');
});
