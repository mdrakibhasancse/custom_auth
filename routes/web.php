<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [RegisterController::class, 'registerForm'])->name('registerForm');
Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::get('login', [LoginController::class, 'loginForm'])->name('loginForm');
Route::post('login', [LoginController::class, 'login'])->name('login');



Route::get('forgot-password', [ForgotPasswordController::class, 'linkRequestForm'])->name('linkRequestForm');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('sendResetLinkEmail');
Route::get('reset-password-form', [ForgotPasswordController::class, 'resetPasswordForm'])->name('resetPasswordForm');
Route::post('reset-password', [ForgotPasswordController::class, 'reset'])->name('passwordReset');


Route::get('dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
// ->middleware('auth');



// email_verified route start

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function () {
    $user = Auth::user();
    $user->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth'])->name('verification.send');

// email_verified route end

// google login route
Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('google.login');
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);