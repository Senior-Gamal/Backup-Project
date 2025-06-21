<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::redirect('/', '/login');
use App\Http\Controllers\BackupServerController;
use App\Http\Controllers\ClientServerController;
use App\Http\Controllers\DashboardController;

// Authentication
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'can:access-admin-sections'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('backupservers', BackupServerController::class)
        ->middleware('role:admin');

    Route::resource('clientservers', ClientServerController::class)
        ->middleware('role:admin');
});
