<?php
require_once '../../vendor/autoload.php';
 use App\Controllers\AuthController;
 


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
        header("Location: ../Views/Auth/logIn.php"); 
        exit();
    } else {
        
            $email = $_POST['email'];
            $password = $_POST['password'];
            $authController = new AuthController();
            $authController->logInUser($email, $password);
      
     }
}
?>
