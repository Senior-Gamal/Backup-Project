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

    Route::resource('servers', ServerController::class)->only(['index']);
    Route::resource('backup-servers', BackupServerController::class)->only(['index']);
    Route::resource('server-backups', ServerBackupController::class)->only(['index']);
    Route::resource('license-groups', LicenseGroupController::class)->only(['index']);
    Route::resource('licenses', LicenseController::class)->only(['index']);

    Route::middleware('role:admin,manager')->group(function () {
        Route::resource('servers', ServerController::class)->only(['create','store','edit','update']);
        Route::resource('backup-servers', BackupServerController::class)->only(['create','store','edit','update']);
        Route::resource('server-backups', ServerBackupController::class)->only(['create','store','edit','update']);
        Route::resource('license-groups', LicenseGroupController::class)->only(['create','store','edit','update']);
        Route::resource('licenses', LicenseController::class)->only(['create','store','edit','update']);
    });

    Route::middleware('role:admin')->group(function () {
        Route::resource('servers', ServerController::class)->only(['destroy']);
        Route::resource('backup-servers', BackupServerController::class)->only(['destroy']);
        Route::resource('server-backups', ServerBackupController::class)->only(['destroy']);
        Route::resource('license-groups', LicenseGroupController::class)->only(['destroy']);
        Route::resource('licenses', LicenseController::class)->only(['destroy']);
        Route::resource('users', UserController::class)->except(['show', 'create', 'store']);
    });
});

Auth::routes();
