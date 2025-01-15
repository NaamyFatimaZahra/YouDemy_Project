<?php
namespace App\Models;
use app\config\DataBase;
require '../config/DataBase.php';
use PDO;
session_start();

class UserModel {
    private $conn;
    public $userExist;
    public function __construct() {
      
            // Attempt to create the database connection
            $db = new Database();
            $this->conn = $db->connection();
       
    }
//     public function findUser($email, $password) {
   
//         // Vérifiez si l'utilisateur existe
//         $query = "SELECT * FROM Users WHERE email = :email";
//         $stmt = $this->conn->prepare($query);
//         $stmt->bindParam(':email', $email);
//         $stmt->execute();
        
//         // Récupérer les informations de l'utilisateur
//         $user = $stmt->fetch(PDO::FETCH_ASSOC);

//         if (!$user) {
//             // Aucun utilisateur trouvé
//             $_SESSION['LoginErrors'] = "Aucun utilisateur trouvé avec cet email.";
//             header("Location: ../views/Auth/login.php");
//             exit();
//         }

//         // Vérifiez le mot de passe
//         if (!password_verify($password, $user['password'])) {
//             // Mot de passe incorrect
//             $_SESSION['LoginErrors'] = "Mot de passe incorrect.";
//             header("Location: ../../app/views/Auth/login.php");
//             require "../../app/views/Recruiter/index.php";
//             exit();
//         }

//         // Rediriger l'utilisateur en fonction de son rôle
//         switch ($user['role_id']) { // Supposant que "role" est un champ dans la base de données
//             case "1":
//                 header("Location: ../../app/views/admin/dashboard.php");
//                 break;
//             case "3":
//                 header("Location: ../../app/views/Candidate/index.php");
//                 break;
//             case "2":
//                 header("../../app/views/Recruiter/index.php");
//                 break;
//             // default:
//             //     throw new Exception("Rôle non autorisé.");
//         }
//         exit();
    
// }

    // public function findUser($email, $password) {
    //     $query = "SELECT COUNT(*) FROM Users WHERE email = :email ";
    //         $stmt = $this->conn->prepare($query);
    //         $stmt->bindParam(':email', $email);
    //         $stmt->execute();
            
    //         // Check if the user exists
    //         $existingUserCount = $stmt->fetchColumn();
            
    //         if ($existingUserCount == 0) {
               
    //              $_SESSION['messagesLoginErrors'] = "No user found with this email.";
                 
           
    //         }else{
    //              $query = "SELECT * FROM Users WHERE email = :email ";
    //         $stmt = $this->conn->prepare($query);
    //         $stmt->bindParam(':email', $email);
    //         $stmt->execute();

    //         // Check if user exists
    //         $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
    //             // Verify password if user exists
    //             if (password_verify($password, $user['password'])) {
    //                 //  session_start();
        
             
    //     switch ($user->getRole()->getTitle()) {
    //         case "Administrateur":
    //             header("Location: /admin/statistique.php");
    //             break;
    //         case "candidate":
    //             header("Location: /candidate/index.php");
    //             break;
    //         case "recruiter":
    //             header("Location: /recruiter/index.php");
    //             break;
    //         default:
    //             throw new Exception("Unauthorized role.");
    //     }
    //     exit(); 
    //             } else{
    //                  $_SESSION['messagesLoginErrors'] = "Incorrect password.";
    //                   header("Location: ../views/Auth/login.php");
    //                 exit();
    //             }
            
    //         }
       
    // }


    public function createUser($username, $email, $password, $accountType): void {
       
            // Check if the user already exists by email or username
            $query = "SELECT COUNT(*) FROM Users WHERE email = :email OR `name` = :username";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            
            // Check if the user exists
            $existingUserCount = $stmt->fetchColumn();
            
            if ($existingUserCount > 0) {
            // If user exists, store the error message in the session
            $_SESSION['error'] = "A user with this email or username already exists.";
        header("Location: ../views/Auth/register.php");
      exit();
        }else{
           // Prepare the SQL query to insert the new user into the Users table
            $query = "INSERT INTO Users (`name`, email, phone_number, password, role_id) 
                      VALUES (:username, :email, :phone, :password, :accountType)";
            $stmt = $this->conn->prepare($query);

            // Bind the parameters to the SQL query
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':accountType', $accountType);

            // Execute the query to insert the data into the database
            $stmt->execute();
            switch ($accountType) {
            case 1: // Example: Admin
                header("Location: ../views/admin/dashboard.php");
                break;
            case 2: // Example: Recruiter
                header("Location: ../views/Teacher/dashboard.php");
                break;
            case 3: // Example: Candidate
                header("Location: ../views/Student/index.php");
                break;
           
        }
        exit(); 
            
            }

           
        } 
    }

