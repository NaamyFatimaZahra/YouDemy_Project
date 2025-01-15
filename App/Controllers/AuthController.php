<?php
namespace app\Controllers;
class AuthController{
    public function signUpUser($username, $email, $password,$role){
        $createAccount=new userModel();
        $createAccount->createUser($username, $email, $password, $role);
    }
}

