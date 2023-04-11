<?php 

namespace App\Controller;

class HomeController{
    public function index(){
        //echo 'working';
        return view('public.index', []);
    }
}