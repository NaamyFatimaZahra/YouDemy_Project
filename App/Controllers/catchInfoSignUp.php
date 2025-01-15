<?php
require_once("AuthController.php");

 use App\Controllers\AuthController;
 
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $messages = []; 

    
    $accountType = $_POST["account_type"];
    if ($accountType !== "teacher" && $accountType !== "student") {
        $messages[] = "Type of account is invalide. can you select 'teacher' ou 'student'.";
    }
    
    if (empty($_POST['username'])) {
        $messages[] = "User name is obligatoire.";
    }
    if (empty($_POST['email']) || filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $messages[] = "Email is obligatory.";
    }
    if (empty($_POST['password']) || empty($_POST['password_copy'])) {
        $messages[] = "Password is obligatory.";
    }
    if ($_POST['password_copy'] !== $_POST['password']) {
        $messages[] = "Password confirmation does not match.";
    }

   
    if (!empty($messages)) {
        $_SESSION['messagesSignUpErrors'] = $messages;
        header('Location:../Views/Auth/signUp'); 
        exit;
    } else {
       
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($accountType == "student") {
            $authController = new AuthController();
            $authController->signUpUser($username, $email, $password, 2);
        } elseif ($accountType == "teacher") {
          
            $authController = new AuthController();
            $authController->signUpUser($username, $email, $phone, $password, 3);
        }
    }
}
?>
