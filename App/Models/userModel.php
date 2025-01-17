<?php
namespace App\Models;
include_once "../../vendor/autoload.php";
use App\config\DataBase;
use PDO;
session_start();

class UserModel {
    private $conn;
    public function __construct(){
            // Attempt to create the database connection
            $db = new Database();
            $this->conn = $db->connect();
    }


    public function createUser($username, $email, $password, $accountType) {       
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
             return $stmt->execute();
          
            }

           
        } 








    public function findUser($email, $password) {
            $query = "SELECT * FROM Users WHERE email=:email";
            $all_row = $this->conn->prepare($query);
            $all_row->bindParam(':email', $email);
            $all_row->execute();

            // Get the row count
            $existingUserCount = $all_row->rowCount();
            $user = $all_row->fetch(PDO::FETCH_ASSOC);
           

            if ($existingUserCount == 0) {
             
                 $_SESSION['messagesLoginErrors'] = "No user found with this email or password .";
                 header('Location:../Views/Auth/login.php');
               exit();
            }else{
         
               
                // Verify password if user exists
        if (password_verify($password, $user['password'])) {
                        $_SESSION['user'] = [
                    'id' => $user['id'],
                    'role_id' => $user['role_id'],
                    'name' => $user['name']];
         switch ($user['role_id']) {
                case 1: // Example: Admin
                header("Location: ../views/admin/dashboard.php");
                break;
                case 2: // Example: Student
                header("Location: ../views/Student/index.php");
                break;
                case 3: // Example: Teacher
                    header("Location: ../views/Teacher/dashboard.php");
                break;
           
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

