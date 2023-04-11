<?php

use App\Services\Router as Route;

// Routes
Route::get('/', 'public/index');
Route::any('/404', 'public/404');