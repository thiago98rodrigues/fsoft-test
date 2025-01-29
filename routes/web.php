<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::post('/store-user', [UserController::class, 'store'])->name('user-store');
    Route::get('/edit-user/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/apdate-user/{user}', [UserController::class, 'update'])->name('user-update');
    Route::delete('/destroy-user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    }

);

Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [UserController::class, 'create'])->name('user.create');

Route::view('/', 'login.form')->name('login');
