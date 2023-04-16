<?php

namespace App\Services;

class Log
{

    public function info($message){
        self::write('info', $message);
    }

    public function warning($message){
        self::write('warning', $message);
    }

    private function write($level, $message){
        //
    }

}
