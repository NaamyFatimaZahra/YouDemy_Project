<?php 
namespace App\Models;
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';
use App\config\DataBase;
use PDO;

class TeacherModel{
     private $conn;
    public function __construct(){
            // Attempt to create the database connection
            $db = new Database();
            $this->conn = $db->connect();
             
    }
    
  public function displayAllCourse($table1,$table2,$column2,$table3,$column3,$id):array{
  $query = "SELECT *,$table2.name as table2_name,$table3.name as table3_name,$table1.id as table1_id FROM $table1
INNER JOIN $table2 ON $table1.$column2=$table2.id
INNER JOIN $table3 ON $table1.$column3=$table3.id
where $table1.$column2=$id
";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            // Check if the user exists
           return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
  }
  


    
}