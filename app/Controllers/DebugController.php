<?php

namespace App\Controllers;

class DebugController
{
    public function error_400(){
        return view('error.400');
    }
    public function error_401(){
        return view('error.401');
    }
    public function error_403(){
        return view('error.403');
    }
    public function error_404(){
        return view('error.404');
    }
    public function error_500(){
        return view('error.500');
    }
    public function error_503(){
        return view('error.503');
    }

}
