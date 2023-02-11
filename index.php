<?php
// START SESSIONS
session_start();

// Connect
require_once __DIR__ . '/vendor/autoload.php';  // Composer Packages
require_once __DIR__ . '/app/Kernel.php';       // Core connector
require_once __DIR__ . '/app/Helpers/App.php';  // Helpers
require_once __DIR__ . '/core.php';             // Core Loader

// Load ENV values
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// FOR TESTING





// Router Controller
require_once __DIR__ . '/routes/web.php';