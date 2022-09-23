<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;

/**
 * Users Route
 */

Route::prefix('users')->group(function () {
    //Resource Route
    Route::get('', [UserController::class, 'index'])
        ->name('users.index')->middleware('myweb.auth:users.show');

    Route::get('/create', [UserController::class, 'create'])
        ->name('users.create')->middleware('myweb.auth:users.create');

    Route::post('', [UserController::class, 'store'])
        ->name('users.store')->middleware('myweb.auth:users.create');

    Route::get('/{user}', [UserController::class, 'show'])
        ->name('users.show')->middleware('myweb.auth:users.show');

    Route::get('/{user}/edit', [UserController::class, 'edit'])
        ->name('users.edit')->middleware('myweb.auth:users.edit');

    Route::put('/{user}', [UserController::class, 'update'])
        ->name('users.update')->middleware('myweb.auth:users.edit');

    Route::delete('/{user}', [UserController::class, 'destroy'])
        ->name('users.destroy')->middleware('myweb.auth:users.destroy');

    // For Change User Status
    Route::put('users/status/{id}', [UserController::class, 'status'])
        ->name('users.status')
        ->where('id', '[0-9]+')->middleware('myweb.auth:users.status');
});
