<?php

use App\Services\Router as Route;

// Routes
Route::get('/admin', 'admin/index');
Route::any('/admin/blog', 'admin/404');