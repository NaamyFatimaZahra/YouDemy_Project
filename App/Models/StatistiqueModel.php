<?php 
namespace App\Models;
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';
use App\config\DataBase;
use PDO;

class StatistiqueModel{
     private $conn;
    public function __construct(){
            // Attempt to create the database connection
            $db = new Database();
            $this->conn = $db->connect();      
    }
   

     public function CountTotal($table){
            $query = "SELECT count(*) FROM $table";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
             $rowCount = $stmt->fetchColumn();
              return $rowCount;
    } 
    public function topCourse(){
    $query = "SELECT courses.title as course_name,  course_id  FROM `enrollment`
    Inner join courses
    ON enrollment.course_id=courses.id
    GROUP BY enrollment.course_id LIMIT 1";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $topCourse = $stmt->fetch(PDO::FETCH_ASSOC);
    return $topCourse;
  
}
  public function treeTop():array {
   
    $query = "SELECT *, users.name as userName,COUNT(*) as totalCourseForTeacher  FROM users
    Inner join courses
    ON users.id=courses.teacher_id
    GROUP BY courses.teacher_id LIMIT 3";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $treeTop = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $treeTop;
  
}
    




    
}