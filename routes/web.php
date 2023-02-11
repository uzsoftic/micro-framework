<?php

use App\Core\Route;

// Default folder prefix
$folder = 'views/frontend';

// Routes
Route::get('/', $folder.'/index.php');
Route::any('/404', $folder.'/404.php');