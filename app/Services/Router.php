<?php

namespace App\Services;

class Router{
    // GET POST PUT PATCH DELETE methods
    public static function get($route, $controller, $path_to_include = NULL){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            self::route($route, $controller, $path_to_include);
        }
    }
    public static function post($route, $controller, $path_to_include = NULL){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            self::route($route, $controller, $path_to_include);
        }
    }
    public static function put($route, $controller, $path_to_include = NULL){
        if($_SERVER['REQUEST_METHOD'] == 'PUT'){
            self::route($route, $controller, $path_to_include);
        }
    }
    public static function patch($route, $controller, $path_to_include = NULL){
        if($_SERVER['REQUEST_METHOD'] == 'PATCH'){
            self::route($route, $controller, $path_to_include);
        }
    }
    public static function delete($route, $controller, $path_to_include = NULL){
        if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
            self::route($route, $controller, $path_to_include);
        }
    }

    public static function fallback($route){
        self::route_fallback($route);
    }

    // ANY route
    public static function any($route, $controller, $path_to_include = NULL){
        self::route($route, $controller, $path_to_include);
    }

    // ROUTE function

    /**
     * @throws \Exception
     */
    private static function route($route, $controller, $path_to_include){

        $request_url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL) ?? '/';
        //$request_url = rtrim($request_url, '/') ?? '/';
        $request_url = strtok($request_url, '?') ?? '/';
        $route_parts = explode('/', $route);
        $request_url_parts = explode('/', $request_url);
        array_shift($route_parts);
        array_shift($request_url_parts);

        if ($request_url == '/404'){
            echo '404 error';
            exit();
        }

        try {
            if($request_url == $route){
                if(is_array($controller)){
                    if(method_exists($controller[0], $controller[1])){
                        (new $controller[0])->{$controller[1]}();
                        exit();
                    }else{
                        throw new \Exception('Method undefined. Check route Class or Function.');
                    }

                }
            }
        }catch (\Exception $exception){
            throw new \Exception($exception->getMessage());
        }

    }

    private static function route_fallback($route){
        $request_url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL) ?? '/';
        $uri = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

        // public folder
        if (!$uri[1] == 'public'){
            //
        }

        // exists file // woff woff2 ttf
        if (file_exists($file = realpath(root_dir()).$request_url)){
            $file_info = pathinfo($file);
            switch ($file_info['extension']){
                case 'css': header("Content-type: text/css; charset: UTF-8"); break;
                case 'ttf': header("Content-type: font/ttf; charset: UTF-8"); break;
                case 'woff': header("Content-type: font/woff; charset: UTF-8"); break;
                case 'woff2': header("Content-type: font/woff2; charset: UTF-8"); break;
            }

            echo readfile($file);
            exit();
        }

        echo '404 error';
        exit();

    }

    // OUT function
    public static function out($text){
        echo htmlspecialchars($text);
    }

    // CSRF checker
    public static function set_csrf(){
        if( ! isset($_SESSION["csrf"]) ){ $_SESSION["csrf"] = bin2hex(random_bytes(50)); }
        echo '<input type="hidden" name="csrf" value="'.$_SESSION["csrf"].'">';
    }

    public static function is_csrf_valid(){
        if( ! isset($_SESSION['csrf']) || ! isset($_POST['csrf'])){ return false; }
        if( $_SESSION['csrf'] != $_POST['csrf']){ return false; }
        return true;
    }
}