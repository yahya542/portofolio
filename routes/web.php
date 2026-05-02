<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SecretLoginController;
use Illuminate\Support\Facades\Route;

// Secret login routes (before other routes to avoid conflicts)
Route::get('/secret-login', [SecretLoginController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/secret-login', [SecretLoginController::class, 'login'])->name('admin.login');
Route::post('/logout', [SecretLoginController::class, 'logout'])->name('admin.logout');
Route::get('/api/secret-login', [SecretLoginController::class, 'check']);

// Frontend routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/{slug}', [PageController::class, 'show'])->where('slug', '^(?!admin).*$')->name('page.show');

// Admin routes (will be added later)
require __DIR__.'/admin.php';
