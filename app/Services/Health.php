<?php

namespace App\Services;

use Exception;

class Health
{
    public function check_echo_text(){
        echo "Hello World";
    }

    public function check_database_connection(): bool
    {
        try {
            $connection = db('SELECT * FROM `users`');
            if ($connection){
                return true;
            }
        }catch (Exception $e){

        }
        return false;
    }



}