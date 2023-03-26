<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


# Authentication
Route::get('sign-in', [\App\Http\Controllers\Auth\AuthController::class, 'signIn'])->name('auth.signIn');
Route::post('sign-in', [\App\Http\Controllers\Auth\AuthController::class, 'handleSignIn'])->name('auth.handleSignIn');

Route::get('sign-up', [\App\Http\Controllers\Auth\AuthController::class, 'signUp'])->name('auth.signUp');
Route::post('sign-up', [\App\Http\Controllers\Auth\AuthController::class, 'handleSignUp'])->name('auth.handleSignUp');

Route::get('sign-out', [\App\Http\Controllers\Auth\AuthController::class, 'handleSignOut'])->name('auth.handleSignOut');


# Merchant
Route::group(['prefix' => 'merchant', 'middleware' => ['auth', 'check_merchant_user']], function () {

    # Merchant Create, Getting Started
    Route::get('create', [\App\Http\Controllers\Merchant\MerchantController::class, 'create'])->name('merchant.merchant.create');
    Route::post('create', [\App\Http\Controllers\Merchant\MerchantController::class, 'store'])->name('merchant.merchant.store');

    Route::group(['middleware' => ['merchant']], function () {

        # Dashboard
        Route::get('dashboard', [\App\Http\Controllers\Merchant\DashboardController::class, 'index'])->name('merchant.dashboard');

        # Programs
        Route::get('programs', [\App\Http\Controllers\Merchant\ProgramController::class, 'index'])->name('merchant.programs');

        Route::get('programs/create', [\App\Http\Controllers\Merchant\ProgramController::class, 'create'])->name('merchant.programs.create');
        Route::post('programs/create', [\App\Http\Controllers\Merchant\ProgramController::class, 'store'])->name('merchant.programs.store');

    });

});
