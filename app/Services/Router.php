<?php

namespace App\Services;

class Router{
    // GET POST PUT PATCH DELETE methods
    public static function get($route, $path_to_include){
        //return 1;
        if( $_SERVER['REQUEST_METHOD'] == 'GET' ){ self::route($route, $path_to_include); }
    }
    public static function post($route, $path_to_include){
        if( $_SERVER['REQUEST_METHOD'] == 'POST' ){ self::route($route, $path_to_include); }
    }
    public static function put($route, $path_to_include){
        if( $_SERVER['REQUEST_METHOD'] == 'PUT' ){ self::route($route, $path_to_include); }
    }
    public static function patch($route, $path_to_include){
        if( $_SERVER['REQUEST_METHOD'] == 'PATCH' ){ self::route($route, $path_to_include); }
    }
    public static function delete($route, $path_to_include){
        if( $_SERVER['REQUEST_METHOD'] == 'DELETE' ){ self::route($route, $path_to_include); }
    }

    // ANY route
    public static function any($route, $controller, $path_to_include){ self::route($route, $controller, $path_to_include); }

    // ROUTE function
    private static function route($route, $controller, $path_to_include){
        $callback = $path_to_include;
        if( !is_callable($callback) ){
            if(!strpos($path_to_include, '.php')){
                $path_to_include.='.php';
            }
        }
        if($route == "/404"){
            include_once __DIR__."/../$path_to_include";
            exit();
        }
        $request_url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
        $request_url = rtrim($request_url, '/');
        $request_url = strtok($request_url, '?');
        $route_parts = explode('/', $route);
        $request_url_parts = explode('/', $request_url);
        array_shift($route_parts);
        array_shift($request_url_parts);

        if(is_array($controller)){
            (new $controller[0])->{$controller[1]}();
            //$controller = call_user_func(array($controller[0], $controller[1]));
            exit();
        }
        //dd($buildClass);

        if( $route_parts[0] == '' && count($request_url_parts) == 0 ){
            // Callback function
            if( is_callable($callback) ){
                call_user_func_array($callback, []);
                exit();
            }
            include_once __DIR__."/../../views/".$path_to_include;
            exit();
        }
        if( count($route_parts) != count($request_url_parts) ){ return; }
        $parameters = [];
        for( $__i__ = 0; $__i__ < count($route_parts); $__i__++ ){
            $route_part = $route_parts[$__i__];
            if( preg_match("/^[$]/", $route_part) ){
                $route_part = ltrim($route_part, '$');
                array_push($parameters, $request_url_parts[$__i__]);
                $$route_part=$request_url_parts[$__i__];
            }
            else if( $route_parts[$__i__] != $request_url_parts[$__i__] ){
                return;
            }
        }
        // Callback function
        if( is_callable($callback) ){
            call_user_func_array($callback, $parameters);
            exit();
        }

        

        //include_once __DIR__."/../$path_to_include";
        exit();
    }

    private static function routes($route, $controller, $name){
        if(is_array($controller)){
            $controller = (new $controller['class'])->controller['function']();
        }
        dd($controller);
        exit();
    }

    // OUT function
    public static function out($text){echo htmlspecialchars($text);}

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