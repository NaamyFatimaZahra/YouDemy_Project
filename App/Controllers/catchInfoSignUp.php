<?php
require_once("AuthController.php");

 use App\Controllers\AuthController;
 
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $messages = []; 

    
    $accountType = $_POST["account_type"];
    if ($accountType !== "candidate" && $accountType !== "recruiter") {
        $messages[] = "Type de compte invalide. Veuillez sélectionner 'candidate' ou 'recruiter'.";
    }

    
    if (empty($_POST['username'])) {
        $messages[] = "Le nom d'utilisateur est obligatoire.";
    }
    if (empty($_POST['email']) || filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $messages[] = "L'email est obligatoire.";
    }
    
    if (empty($_POST['phone'])) {
        $messages[] = "Le téléphone est obligatoire.";
    }
    if (empty($_POST['password'])) {
        $messages[] = "Le mot de passe est obligatoire.";
    }

   
    if (!empty($messages)) {
        $_SESSION['messagesSignUpErrors'] = $messages;
        header('Location:../Views/Auth/signUp'); 
        exit;
    } else {
       
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        if ($accountType == "student") {
            $authController = new AuthController();
            $authController->signUpUser($username, $email, $phone, $password, 3);
        } elseif ($accountType == "teacher") {
          
            $authController = new AuthController();
            $authController->signUpUser($username, $email, $phone, $password, 2);
        }
    }
}
?>
