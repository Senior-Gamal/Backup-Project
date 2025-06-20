<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackupServerController;

Route::redirect('/', '/backupservers');

Route::resource('backupservers', BackupServerController::class);
