<?php
include_once '../../config/config.php';
require_once '../../../vendor/autoload.php';
 use App\Controllers\AuthController;
 
use App\Models\CrudModel;
 use App\Classes\Teacher;
 use App\Classes\Admin;
 use App\Classes\Student;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $messages = []; 

    if (empty($_POST['email']) ) {
        $messages[] = "Email is obligatory.";
    }elseif (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)===false) {
        $messages[] = "Email is not valid.";
    }
    
    if (empty($_POST['password']) && empty($_POST['password'])) {
        $messages[] = "Password is obligatory.";
    }

    
          
    if (!empty($messages)) {
       
        $_SESSION['messagesLoginErrors'] = $messages;
        header("Location: ../../Views/Auth/logIn.php"); 
        exit();
    } else {
       
            $email = $_POST['email'];
            $password = $_POST['password'];
             $existingUser=new CrudModel();
             $userRow= $existingUser->checkExintence('Users','email', $email);
          
           
            if (!$userRow ) {
                 $_SESSION['messagesLoginErrors'] = "No user found with this email or password .";
                 header("Location:" .BASE_PATH."/App/Views/Auth/login.php");
               exit();
            }else{
         if ( $userRow['role_id']===1) { 
           
            $userStudent=new Admin($userRow['id'],$userRow['name'], $email, $password,'admin');
            $authController = new AuthController($userStudent);
            $authController->logInUser();
        } elseif ($userRow['role_id'] === 3) {
           
             $userTeacher=new Teacher($userRow['id'],$userRow['name'], $email, $password,'teacher');
             $authController = new AuthController($userTeacher);
             $authController->logInUser();
        } elseif ( $userRow['role_id']===2) { 
           
            $userStudent=new Student($userRow['id'],$userRow['name'], $email, $password,'student');
            $authController = new AuthController($userStudent);
            $authController->logInUser();
        }
      
     }
}
}
?>
