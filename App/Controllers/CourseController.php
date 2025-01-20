<?php
namespace App\Controllers;
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';
use App\Models\CrudModel;
use App\Controllers\DisplayAbstactClass;
class AdminController extends DisplayAbstactClass{
      public function displayDetailsCourse($course):array{
         $course_id=$course->getId();
          $details= new CrudModel;
         return $courses->displayTreeTable('courses','users','teacher_id','categories','category_id');
        
        
        
      }
       public function addCourse():bool{
  
        
      }
        public function updateCourse():bool{
     
      }
       public function deleteCourse():array{
       
      }

     
       
}

