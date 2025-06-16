<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ServerController;

Route::get('/', function () {
    return redirect()->route('servers.index');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('servers', ServerController::class)->except(['show']);
});

Auth::routes();
