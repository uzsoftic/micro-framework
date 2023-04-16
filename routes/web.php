<?php

use App\Controller\HomeController;
use App\Controller\AdminController;
use App\Services\Router as Route;

// Routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/admin', [AdminController::class, 'index']);

//Route::any('/', [HomeController::class, 'index'], 'public/index');
//Route::any('/admin', [AdminController::class, 'index'], 'public/index');
//Route::get('/', 'HomeController@index');

//Route::get('/', 'public/index');
//Route::any('/404', 'public/404');

Route::fallback('/404');