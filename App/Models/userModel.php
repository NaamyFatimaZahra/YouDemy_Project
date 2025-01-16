<?php
namespace App\Models;
include_once "../../vendor/autoload.php";
use App\config\DataBase;
use PDO;


class UserModel {
    private $conn;
    public function __construct() {
            // Attempt to create the database connection
            $db = new Database();
            $this->conn = $db->connect();
    }


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
        header("Location: ../Views/Auth/signUp.php");
      exit();
        }else{
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO Users (`name`, email, password, role_id) 
                      VALUES (:username, :email, :password, :accountType)";
            $stmt = $this->conn->prepare($query);

            // Bind the parameters to the SQL query
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':accountType', $accountType);

            // Execute the query to insert the data into the database
            $stmt->execute();
            switch ($accountType) {
                case 1: // Example: Admin
                header("Location: ../views/admin/dashboard.php");
                break;
                case 2: // Example: Teacher
                header("Location: ../views/Student/index.php");
                break;
                case 3: // Example: Student
                    header("Location: ../views/Teacher/dashboard.php");
                break;
           
        }
        exit(); 
            
            }

           
        } 








    public function findUser($email, $password) {
        $query = "SELECT COUNT(*) FROM Users WHERE email = :email ";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            
            // Check if the user exists
            $existingUserCount = $stmt->fetchColumn();
            
            if ($existingUserCount == 0) {
               
                 $_SESSION['messagesLoginErrors'] = "No user found with this email.";
                 
           
            }else{
                 $query = "SELECT * FROM Users WHERE email = :email ";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            // Check if user exists
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
                // Verify password if user exists
                if (password_verify($password, $user['password'])) {
                    //  session_start();
        
             
        switch ($user->getRole()->getTitle()) {
            case "Administrateur":
                header("Location: /admin/statistique.php");
                break;
            case "candidate":
                header("Location: /candidate/index.php");
                break;
            case "recruiter":
                header("Location: /recruiter/index.php");
                break;
            default:
                throw new Exception("Unauthorized role.");
        }
        exit(); 
                } else{
                     $_SESSION['messagesLoginErrors'] = "Incorrect password.";
                      header("Location: ../views/Auth/login.php");
                    exit();
                }
            
            }
       
    }


    }

