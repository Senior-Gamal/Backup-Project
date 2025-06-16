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
    Route::get('/clients-servers/create', [App\Http\Controllers\ClientServerController::class, 'create'])->name('client-servers.create');
    Route::post('/clients-servers', [App\Http\Controllers\ClientServerController::class, 'store'])->name('client-servers.store');

    Route::get('/server-backups', [App\Http\Controllers\ServerBackupController::class, 'index'])->name('server-backups.index');
    Route::get('/server-backups/create', [App\Http\Controllers\ServerBackupController::class, 'create'])->name('server-backups.create');
    Route::post('/server-backups', [App\Http\Controllers\ServerBackupController::class, 'store'])->name('server-backups.store');

    Route::get('/licenses', [App\Http\Controllers\LicenseController::class, 'index'])->name('licenses.index');
    Route::get('/licenses/create', [App\Http\Controllers\LicenseController::class, 'create'])->name('licenses.create');
    Route::post('/licenses', [App\Http\Controllers\LicenseController::class, 'store'])->name('licenses.store');

    Route::get('/license-groups', [App\Http\Controllers\LicenseGroupController::class, 'index'])->name('license-groups.index');
    Route::get('/license-groups/create', [App\Http\Controllers\LicenseGroupController::class, 'create'])->name('license-groups.create');
    Route::post('/license-groups', [App\Http\Controllers\LicenseGroupController::class, 'store'])->name('license-groups.store');

    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
});
