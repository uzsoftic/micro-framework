<?php 

namespace App\Controller;

class AdminController{
    public function index(){
        $users = db("SELECT * FROM users");
        return view('admin.index', ['users' => $users]);
    }
}