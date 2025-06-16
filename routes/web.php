<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    Route::get('/servers', [App\Http\Controllers\ServerController::class, 'index'])->name('servers.index');
    Route::get('/servers/create', [App\Http\Controllers\ServerController::class, 'create'])->name('servers.create');
    Route::post('/servers', [App\Http\Controllers\ServerController::class, 'store'])->name('servers.store');

    Route::get('/clients-servers', [App\Http\Controllers\ClientServerController::class, 'index'])->name('client-servers.index');

    Route::get('/server-backups', [App\Http\Controllers\ServerBackupController::class, 'index'])->name('server-backups.index');

    Route::get('/licenses', [App\Http\Controllers\LicenseController::class, 'index'])->name('licenses.index');

    Route::get('/license-groups', [App\Http\Controllers\LicenseGroupController::class, 'index'])->name('license-groups.index');

    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
});
