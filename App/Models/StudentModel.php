<?php 
namespace App\Models;
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';
use App\config\DataBase;
use PDO;
class StudentModel{
     private $conn;
    public function __construct(){
            
            $db = new Database();
            $this->conn = $db->connect();
             
    }
        public function displayAllCourse():array{
           $query = "SELECT *,users.name as table2_name, categories.name as table3_name, courses.id as table1_id FROM courses
           INNER JOIN users ON courses.teacher_id=users.id
           INNER JOIN categories ON courses.category_id=categories.id
           INNER JOIN enrollment ON courses.id=enrollment.course_id

           where Enrollment.student_id=:id
          ";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id',$_SESSION['user']['id']);

            $stmt->execute();     
           return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
  }

   public function checkEnrollment($id_user,$id_course){
      
            $query = "SELECT * FROM enrollment WHERE 
            enrollment.course_id=:id_course
            AND enrollment.student_id=:id_user ";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id_course', $id_course);
            $stmt->bindParam(':id_user', $id_user);
            $stmt->execute();
          
            $existingUser= $stmt->fetch(PDO::FETCH_ASSOC);
             return $existingUser;
    }



     public function ADDEnrollment($user,$course){
      
        //  echo $user,$course;
            $query = "INSERT INTO `enrollment`( `course_id`, `student_id`) 
            VALUES (:id_course,:id_user)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id_course', $course);
            $stmt->bindParam(':id_user', $user);
           
            return $stmt->execute();
          
        
    }

  


    
}