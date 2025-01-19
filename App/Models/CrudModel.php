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
    public function checkExintence($table,$column,$row){
        // Check if the user already exists by email or username
            $query = "SELECT * FROM $table WHERE $column =:row ";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':row', $row);
            $stmt->execute();
            // Check if the user exists
            $existingUser= $stmt->fetch(PDO::FETCH_ASSOC);
             return $existingUser;
    }

    public function display($table){
       $query = "SELECT * FROM $table ";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            // Check if the user exists
           return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }


    public function delete($table, $id){
   
        $query = "DELETE FROM $table WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

   
        if($stmt->execute()){
            return true;  
        } else {
            return false; 
        }
    }
    public function update($table,$column,$nameUpdate, $id){
       
        $query = "UPDATE $table SET $column =:UpdatedValue WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':UpdatedValue', $nameUpdate);
        $stmt->bindParam(':id',$id);
        return  $stmt->execute();
        

    }

    public function displayTwoTable($table1,$table2,$column2,$condition1,$condition2){
       $query = "SELECT *,$table2.name as table2_name,$table1.name userName,$table1.id as table1_id FROM $table1  
INNER JOIN $table2 ON $table1.$column2=$table2.id
Where $condition1 AND $condition2 ";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            // Check if the user exists
           return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }

     public function Count($table,$condition){
        // Check if the user already exists by email or username
            $query = "SELECT count(*) FROM $table WHERE $condition";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
             $rowCount = $stmt->rowCount();
             return $rowCount;
    } 
    

    public function addValue($table, $column, $valueToAdd) {
       
    $query = "INSERT INTO $table($column) VALUES (:ValueToAdd) ";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':ValueToAdd', $valueToAdd);
    return $stmt->execute();
}


    
}