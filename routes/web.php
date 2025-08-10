<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'homepage')->name('home');

Route::middleware(['guest'])->controller(AuthController::class)->group(function () {
    Route::post('/login', 'authenticate')->name('login');
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'register')->name('create');
});


Route::middleware(['auth'])->controller(AuthUserController::class)->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout',  'logout')->name('logout');
    Route::get('/profile',  'profile')->name('profile');
    Route::put('/profile/update',  'updateProfile')->name('profile.update');
    Route::put('/profile/password/update',  'updatePassword')->name('password.update');
});
