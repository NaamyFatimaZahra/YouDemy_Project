<?php
namespace app\Controllers;
include_once "../../vendor/autoload.php";
use App\Models\UserModel;
class AuthController{
    public function signUpUser($username, $email, $password,$role){
        $createAccount=new UserModel();       
         
        if($createAccount->createUser($username, $email, $password, $role)){
          $this->logInUser($email,$password);
        }
    }
     public function logInUser($email, $password){
        $loginAccount=new UserModel();
        $loginAccount->findUser($email,$password);
        
    }
}

