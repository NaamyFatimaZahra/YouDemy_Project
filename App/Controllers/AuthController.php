<?php
namespace App\Controllers;
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';
use App\Models\UserModel;
class AuthController{

    private  $user;
    // NULL pcq j'ai une methode logout
     public function __construct($user=NULL) {
      $this->user=$user;
    }



    public function signUpUser(){
         
      
      $createAccount=new UserModel();       
      if($createAccount->createUser($this->user)) {
           $this->logInUser($this->user);
         }
        
           
    
        
    }



     public function logInUser(){
  
        $loginAccount=new UserModel();
        $loginAccount->findUser($this->user);
    }


    public function logOut(){
   session_unset();
   session_destroy(); 
   header("Location:" .BASE_PATH."/Public/index.php");
   exit;

    }
}

