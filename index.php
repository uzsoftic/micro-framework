<?php
    // START SESSIONS
    session_start();

    // Safe Error Exceptions
    function exception_error_handler($errno, $errstr, $errfile, $errline ) {
        throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
    }
    set_error_handler("exception_error_handler");


    try {

        if(is_file('/vendor/autoload.php')){
            throw new Exception('composer not working');
        }

        if(is_file('/.env')){
            throw new Exception('.env file not found');
        }

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

    }catch(Exception $e) {
        require_once __DIR__ . '/views/error/global.php';
        //throw new Exception('Composer not connected. Please check /vendor folder or fix composer.js or use composer install command.');

    }