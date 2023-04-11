<?php 

namespace App\Controller;

class HomeController{
    public function index(){
        //echo 'working';
        $users = db("SELECT * FROM users");
        return view('public/index.php', ['users' => $users]);
    }
}