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


# Vendor
Route::group(['prefix' => 'vendor', 'middleware' => ['auth', 'check_vendor_user']], function () {

    # Vendor Create, Getting Started
    Route::get('create', [\App\Http\Controllers\AppVendor\VendorController::class, 'create'])->name('app-vendor.vendor.create');
    Route::post('create', [\App\Http\Controllers\AppVendor\VendorController::class, 'store'])->name('app-vendor.vendor.store');

    Route::group(['middleware' => ['app_vendor']], function () {

        # Dashboard
        Route::get('dashboard', [\App\Http\Controllers\AppVendor\DashboardController::class, 'index'])->name('app-vendor.dashboard');

        # Programs
        Route::get('programs', [\App\Http\Controllers\AppVendor\ProgramController::class, 'index'])->name('app-vendor.programs');

        Route::get('programs/create', [\App\Http\Controllers\AppVendor\ProgramController::class, 'create'])->name('app-vendor.programs.create');
        Route::post('programs/create', [\App\Http\Controllers\AppVendor\ProgramController::class, 'store'])->name('app-vendor.programs.store');

    });

});
