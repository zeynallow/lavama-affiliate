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

Route::get('/', function () {
    return view('app-vendor.dashboard');
});


# Authentication
Route::get('sign-in', [\App\Http\Controllers\Auth\AuthController::class, 'signIn'])->name('auth.signIn');
Route::post('sign-in', [\App\Http\Controllers\Auth\AuthController::class, 'handleSignIn'])->name('auth.handleSignIn');

Route::get('sign-up', [\App\Http\Controllers\Auth\AuthController::class, 'signUp'])->name('auth.signUp');
Route::post('sign-up', [\App\Http\Controllers\Auth\AuthController::class, 'handleSignUp'])->name('auth.handleSignUp');

Route::get('sign-out', [\App\Http\Controllers\Auth\AuthController::class, 'handleSignOut'])->name('auth.handleSignOut');


# Vendor
Route::group(['prefix' => 'vendor', 'middleware' => ['auth']], function () {
    Route::get('dashboard', [\App\Http\Controllers\AppVendor\DashboardController::class, 'index'])->name('app-vendor.dashboard');
});
