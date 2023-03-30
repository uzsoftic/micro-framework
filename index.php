<?php
    // Require Core
    require_once(__DIR__.'/app/Kernel.php');



    try {

        if(is_file('/vendor/autoload.php')){
            throw new Exception('composer not working');
        }

        if(is_file('/.env')){
            throw new Exception('.env file not found');
        }



        // Load ENV values
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        // FOR TESTING



        // Router Controller
        require_once __DIR__ . '/routes/web.php';

    }catch(Exception $e) {
        require_once __DIR__ . '/views/error/global.php';
    }