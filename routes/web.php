<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BackupServerController;
use App\Http\Controllers\ClientServerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\BackupScheduleController;

Route::redirect('/', '/login');

// Authentication
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'can:access-admin-sections'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('backupservers', BackupServerController::class)
        ->middleware('role:admin|manager');

    Route::resource('clientservers', ClientServerController::class)
        ->middleware('role:admin|manager');

    Route::resource('licenses', LicenseController::class)
        ->middleware('role:admin|manager');

    Route::resource('schedules', BackupScheduleController::class)
        ->only(['index', 'create', 'store', 'destroy'])
        ->middleware('role:admin|manager');
});
