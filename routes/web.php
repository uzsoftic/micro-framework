<?php

use App\Controller\HomeController;
use App\Services\Router as Route;

// Routes
Route::any('/', [HomeController::class, 'index'], 'public/index');
//Route::get('/', 'public/index');
//Route::any('/404', 'public/404');