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
           return $stmt->fetch(PDO::FETCH_ASSOC);
    
  }
  
  
 public function addNewCourse($data):int{
  
 try {

  $query='INSERT INTO courses (title, description, content, category_id, teacher_id, publication_date)
VALUES (:title, :description, :content, :category_id, :teacher_id, NOW());';
      $stmt = $this->conn->prepare($query);
             $stmt->bindParam(':title', $data['title']);
            $stmt->bindParam(':description', $data['description']);
            $stmt->bindParam(':content', $data['content']);
            $stmt->bindParam(':category_id', $data['category_id']);
            $stmt->bindParam(':teacher_id', $data['teacher_id']);
            $stmt->execute();
             return $this->conn->lastInsertId();
            } catch (PDOException $e) {
            error_log("Error creating course: " . $e->getMessage());
            return false;
        }
        }

public function addNewTag($data){
           $query='INSERT INTO courses_tags (course_id,tag_id)
           VALUES (:course_id, :tag_id);';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':course_id', $data['course_id']);
            $stmt->bindParam(':tag_id', $data['tag_id']);
           return $stmt->execute();
        
  
}

    
  }

    
