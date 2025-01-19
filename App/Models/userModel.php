<?php
namespace App\Models;
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';
use App\config\DataBase;
use PDO;


class UserModel {
    private $conn;
    public function __construct(){
            // Attempt to create the database connection
            $db = new Database();
            $this->conn = $db->connect();
    }


    public function createUser($user) {  
           $email=$user->getEmail();     
           $username=$user->getName();     
           $password=$user->getPassword();     
           $AccountStatus=$user->getAccountStatus();     
           if($user->getRole()=='teacher'){
            $accountType=3;
           }elseif($user->getRole()=='student'){
            $accountType=2;
           } 
             $existingUser=new CrudModel();
             
            if ($existingUser->checkExintence('Users','email', $email)) {
               
            // If user exists, store the error message in the session
            $_SESSION['error'] = "A user with this email or username already exists.";
             header("Location: " .BASE_PATH."/App/Views/Auth/signUp.php");
               exit();
        }else{
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            $query = "INSERT INTO Users (`name`, email, password, role_id,validation_account) 
                      VALUES (:username, :email, :password, :accountType,:AccountStatus)";
            $stmt = $this->conn->prepare($query);

            // Bind the parameters to the SQL query
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':accountType', $accountType);
            $stmt->bindParam(':AccountStatus', $AccountStatus);

            // Execute the query to insert the data into the database
             return $stmt->execute();
       
          
            }

           
        } 








    public function findUser($user) {
           $email=$user->getEmail();         
           $password=$user->getPassword(); 
            $existingUser=new CrudModel();
            $userRow= $existingUser->checkExintence('Users','email', $email);
          
            if (!$userRow ) {
             
                 $_SESSION['messagesLoginErrors'] = "No user found with this email or password .";
                 header("Location:" .BASE_PATH."/App/Views/Auth/login.php");
               exit();
            }else{
         
               
                // Verify password if user exists
        if (password_verify($password, $userRow['password'])) {
                        $_SESSION['user'] = [
                    'id' => $userRow['id'],
                    'role_id' => $userRow['role_id'],
                    'name' => $userRow['name'],
                    'status' => $userRow['status'],
                'AccountStatus' => $userRow['validation_account']];
         switch ($userRow['role_id']) {
                case 1: // Example: Admin
                header("Location: " .BASE_PATH."/App/views/admin/Dashboard.php");
                
                break;
                case 2: // Example: Student
                header("Location: " .BASE_PATH."/App/views/Student/index.php");
                break;
                case 3: // Example: Teacher
                    header("Location: " .BASE_PATH."/App/views/Teacher/Dashboard.php");
                break;
           
        }
        exit(); 
                } else{
                     $_SESSION['messagesLoginErrors'] = "Incorrect password.";
                    header("Location:" .BASE_PATH."/App/views/Auth/login.php");
                    exit();
                }
            
            }
       
    }


    }

