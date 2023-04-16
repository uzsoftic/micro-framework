<?php

use App\Controller\HomeController;
use App\Controller\AdminController;
use App\Services\Router as Route;

// Routes
Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [HomeController::class, 'login']);
Route::get('/register', [HomeController::class, 'register']);
Route::get('/logout', [HomeController::class, 'logout']);

Route::get('/admin', [AdminController::class, 'index']);

Route::fallback('/404');