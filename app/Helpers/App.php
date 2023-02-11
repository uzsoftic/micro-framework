<?php

use App\Core\Database;

if(!function_exists('env')){
    function env($param, $default = ""):string{
        try {
            if (!empty($_ENV[$param])){
                return (string) $_ENV[$param];
            }
            return (string) $default ?? "";
        }catch (Exception $exception){
            return (string) $default ?? "";
        }

    }
}

if(!function_exists('path')){
    function path()
    {
        $path = __DIR__."/../../";
        return $path;
    }
}

if(!function_exists('dump')){
    function dump($any)
    {
        var_dump($any);
    }
}

if(!function_exists('dd')){
    function dd($any)
    {
        var_dump($any);
        return exit();
    }
}

if(!function_exists('asset')){
    function asset($url){
        return '/public/'.$url;
    }
}

if(!function_exists('config')){
    function config($name): array
    {
        $data = (require __DIR__ . '/../../config/'.$name.'.php');
        return (array) $data;
    }
}

if(!function_exists('db')){
    function db($query): array
    {
        // Collect config from config folder
        $config = config('database');

        // Core Functions
        //require_once __DIR__ . '/../../src/Database.php';
        $db = new Database(
            $config['DB_HOST'],
            $config['DB_USER'],
            $config['DB_PASS'],
            $config['DB_NAME']
        );

        return $db->query($query)->fetchAll();
    }
}

