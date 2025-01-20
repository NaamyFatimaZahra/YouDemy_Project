<?php 
namespace App\Models;
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';
use App\config\DataBase;
use PDO;

class CourseModel{
     private $conn;
    public function __construct(){
            // Attempt to create the database connection
            $db = new Database();
            $this->conn = $db->connect();
             
    }
  public function displayDetailsCourse($course_id):array{
    $query='SELECT *, courses.id as idCourse from courses
INNER join users
ON users.id=courses.teacher_id
WHERE courses.id= :course_id';
 $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':course_id',$course_id);
            $stmt->execute();
            // Check if the user exists
           return $stmt->fetch(PDO::FETCH_ASSOC);
    
  }
  


    
}