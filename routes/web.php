<?php

use App\Services\Router as Route;

// Routes
Route::get('/', 'frontend/index');
Route::any('/404', 'frontend/404');