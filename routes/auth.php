<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotController;

/**
 * Users Register Route
 */
Route::prefix('/user')->group(function () {
    Route::get('register', [RegisterController::class, 'register'])
    ->name('register');

    // For Action
    Route::post('register', [RegisterController::class, 'processRegistration'])
    ->name('register.action');


});

/**
 * Reset Password Email Route
 */
Route::prefix('/forgot-password')->group(function () {
    Route::get('', [ForgotController::class, 'forgotPassword'])
    ->name('forgotPassword.form');

    // For Action
    Route::post('', [ForgotController::class, 'processForgotPassword'])
    ->name('forgotPassword.action');
});


/**
 * Reset Password Route
 */
Route::prefix('/reset-password')->group(function () {
    Route::get('{userId}/{code}', [ForgotController::class, 'resetPassword'])
    ->name('resetPassword.form');

    // For Action
    Route::post('{userId}/{code}', [ForgotController::class, 'processResetPassword'])
    ->name('resetPassword.action');
});

/**
 * Change Password Route
 */
Route::prefix('/change-password')->group(function () {
    Route::get('', [ForgotController::class, 'changePassword'])
    ->name('changePassword.form');

    // For Action
    Route::post('', [ForgotController::class, 'processChangePassword'])
    ->name('changePassword.action');
});

Route::get('access-denied', [ForgotController::class, 'accessDenied'])
->name('accessDenied');

require 'roles.php';
require 'users.php';
