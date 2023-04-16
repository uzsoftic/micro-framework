<?php

use Dotenv\Dotenv;
use App\Services\Health;

try {
    // Enable handler
    require_once(__DIR__.'/core/handler.php');

    // Load Composer Packages
    if(!is_file('/vendor/autoload.php')){
        require_once(__DIR__ . '/vendor/autoload.php');
    }else{
        throw new Exception('composer not working');
    }

    // Load ENV values
    if(!is_file('/.env')){
        Dotenv::createImmutable(__DIR__)->load();
    }else{
        throw new Exception('.env file not found');
    }

    // Require Framework Core
    require_once(__DIR__.'/core/core.php');

    $data = config('app.default.language');
    dd($data);
    exit();

    // Require Kernel Auto Connector
    //require_once(__DIR__.'/app/Kernel.php');

    // FOR TESTING
    //(new Health())->check_echo_text();
    //(new Health())->check_database_connection();

    //dd(root_dir());
    //view(1);

    // Router Controller
    require_once __DIR__ . '/routes/web.php';

}catch(Exception $e) {
    require_once __DIR__ . '/views/error/handler.php';
}