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
        return env('APP_URL').'/public/'.$url;
        //return '/public/'.$url;
    }
}

if(!function_exists('load_config')){
    function load_config($name): array
    {
        $data = (require __DIR__ . '/../../config/'.$name.'.php');
        return (array) $data;
    }
}

if(!function_exists('config')){
    function config($name): string|array
    {
        $input = explode('.', $name);
        dump($input);
        $deep = (int) count($input);
        if($deep > 0){
            $config = load_config($input[0]);
            $deep_data = null;

            for ($i=1; $i <= $deep; $i++){
                if (!empty($input[$i])){
                    $deep_data = !empty($deep_data) ? $deep_data[$input[$i]] : $config[$input[$i]];
                }
            }
            return $deep_data;
        }
        return "";
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
    function view($view, $variables = [])
    {
        $view = str_replace('.', '/', $view).'.twig';
        $environment = 'dev';
        $loader = new \Twig\Loader\FilesystemLoader(root_dir().'/views');
        $twig = new \Twig\Environment($loader, [
            'cache' => root_dir().'/storage/cache/views',
        ]);

        $twig->addFunction(new \Twig\TwigFunction('asset', function($url) {
            return asset($url);
        }));

        $twig->addFunction(new \Twig\TwigFunction('config', function($url) {
            return config($url);
        }));

        $template = $twig->load($view);
        print($template->render($variables));
        return null;
    }
}

if(!function_exists('csrf')){
    function csrf(){
        Router::set_csrf();
    }
}
