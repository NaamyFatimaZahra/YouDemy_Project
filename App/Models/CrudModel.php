<?php 
namespace App\Models;
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';
use App\config\DataBase;
use PDO;

class CrudModel{
     private $conn;
    public function __construct(){
            // Attempt to create the database connection
            $db = new Database();
            $this->conn = $db->connect();
             
    }
    function checkExintence($table,$column,$row){
        // Check if the user already exists by email or username
            $query = "SELECT * FROM $table WHERE $column =:row ";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':row', $row);
            $stmt->execute();
            
            // Check if the user exists
            $existingUserCount= $stmt->fetch(PDO::FETCH_ASSOC);
             return $existingUserCount;
    }
}