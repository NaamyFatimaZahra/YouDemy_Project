<?php
namespace app\Controllers;
include_once "../../vendor/autoload.php";
use App\Models\UserModel;
class AuthController{
    public function signUpUser($username, $email, $password,$role){
        $createAccount=new UserModel();
        $createAccount->createUser($username, $email, $password, $role);
        if($createAccount===true){
        $loginAccount=new UserModel();
        $loginAccount->findUser();
        }
    }
}

