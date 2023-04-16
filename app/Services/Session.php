<?php

namespace App\Services;

class Session
{

    public function get($name){
        return $_SESSION[$name] ?? null;
    }

    public function set($name){
        return $_SESSION[$name] ?? null;
    }

    public function put($name, $text){
        return $_SESSION[$name] = $text;
    }

    public function remove($name){
        return $_SESSION[$name] = null;
    }

    public function clear(){
        session_destroy();
        return 1;
    }

}
