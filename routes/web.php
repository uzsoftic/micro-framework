<?php

use App\Controller\HomeController;
use App\Controller\AdminController;
use App\Controllers\DebugController;
use App\Services\Router as Route;

// Routes
Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [HomeController::class, 'login']);
Route::get('/register', [HomeController::class, 'register']);
Route::get('/logout', [HomeController::class, 'logout']);

Route::get('/admin', [AdminController::class, 'index']);

// Test error page
Route::get('/400', [DebugController::class, 'error_400']);
Route::get('/401', [DebugController::class, 'error_401']);
Route::get('/403', [DebugController::class, 'error_403']);
Route::get('/404', [DebugController::class, 'error_404']);
Route::get('/500', [DebugController::class, 'error_500']);
Route::get('/503', [DebugController::class, 'error_503']);

Route::fallback('/404');
