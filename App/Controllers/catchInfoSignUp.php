<?php
require_once '../../vendor/autoload.php';
 use App\Controllers\AuthController;
 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $messages = []; 
    
    $accountType = $_POST["account_type"];
    if ($accountType !== "teacher" && $accountType !== "student") {
        $messages[] = "Type of account is invalide. can you select 'teacher' ou 'student'.";
    }
    
    if (empty($_POST['username'])) {
        $messages[] = "User name is obligatoire.";
    }
  
    if (empty($_POST['email']) ) {
        $messages[] = "Email is obligatory.";
    }elseif (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)===false) {
        $messages[] = "Email is not valid.";
    }
    
    if (empty($_POST['password']) && empty($_POST['password_copy'])) {
        $messages[] = "Password is obligatory.";
    }elseif ($_POST['password_copy'] !== $_POST['password']) {
        $messages[] = "Password confirmation does not match.";
    }

    if (!empty($messages)) {
        $_SESSION['messagesSignUpErrors'] = $messages;
        header("Location: ../Views/Auth/signUp.php"); 
        exit();
    } else {
       
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($accountType == "student") {
            
            // $authController = new AuthController();
            // $authController->signUpUser($username, $email, $password, 2);
        } elseif ($accountType == "teacher") {
            $authController = new AuthController();
            $authController->signUpUser($username, $email, $password, 3);
        }
     }
}
?>
