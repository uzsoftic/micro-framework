<?php

use App\Services\DB as Database;
use App\Services\Router;

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
        return $GLOBALS['db']->query($query)->fetchAll();
    }
}

if(!function_exists('root_dir')){
    function root_dir(){
        return (string) realpath(dirname(__DIR__, 2));
    }
}

if(!function_exists('view')){
    function view($view): void
    {
        /* $loader = new \Twig\Loader\ArrayLoader([
            'index' => 'Hello {{ name }}!',
        ]);
        $twig = new \Twig\Environment($loader);
        
        echo $twig->render('index', ['name' => 'Fabien']); */

        $loader = new \Twig\Loader\FilesystemLoader(root_dir().'/views');
        dd($loader);
        $twig = new \Twig\Environment($loader, [
            'cache' => root_dir().'/storage/cache/views',
        ]);
        $template = $twig->load($view);
        echo $template->render();
        //echo $twig->render($template, ['name' => 'Fabien']);
    }
}

if(!function_exists('csrf')){
    function csrf(){
        Router::set_csrf();
    }
}
