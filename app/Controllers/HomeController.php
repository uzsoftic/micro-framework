<?php 

namespace App\Controller;

class HomeController{
    public function index(){
        $users = db("SELECT * FROM users");
        return view('public.index', ['users' => $users]);
    }

    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function logout(){

    }
}