<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BackupServerController;
use App\Http\Controllers\ServerBackupController;
use App\Http\Controllers\LicenseGroupController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('servers', ServerController::class)->except(['show']);
    Route::resource('backup-servers', BackupServerController::class)->except(['show']);
    Route::resource('server-backups', ServerBackupController::class)->except(['show']);
    Route::resource('license-groups', LicenseGroupController::class)->except(['show']);
    Route::resource('licenses', LicenseController::class)->except(['show']);
    Route::resource('users', UserController::class)->except(['show', 'create', 'store']);
});

Auth::routes();
