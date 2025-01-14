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
    if (empty($_POST['email'])) {
        $messages[] = "L'email est obligatoire.";
    }
    if (empty($_POST['phone'])) {
        $messages[] = "Le téléphone est obligatoire.";
    }
    if (empty($_POST['password'])) {
        $messages[] = "Le mot de passe est obligatoire.";
    }

   
    if (!empty($messages)) {
        $_SESSION['messagesRegisterErrors'] = $messages;
        header('Location: ../views/Auth/register.php'); 
        exit;
    } else {
       
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        if ($accountType == "candidate") {
            $authController = new AuthController();
            $authController->registerUser($username, $email, $phone, $password, 3);
        } elseif ($accountType == "recruiter") {
          
            $authController = new AuthController();
            $authController->registerUser($username, $email, $phone, $password, 2);
        }
    }
}
?>
