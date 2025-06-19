<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resources([
    'clients_servers' => App\Http\Controllers\ClientServerController::class,
    'backup_servers' => App\Http\Controllers\BackupServerController::class,
    'licenses' => App\Http\Controllers\LicenseController::class,
    'license_groups' => App\Http\Controllers\LicenseGroupController::class,
    'server_backups' => App\Http\Controllers\ServerBackupController::class,
]);
