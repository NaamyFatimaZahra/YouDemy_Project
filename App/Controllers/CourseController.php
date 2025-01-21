<?php
namespace App\Controllers;
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';
use App\Models\CourseModel;
use App\Models\CrudModel;
use App\Controllers\DisplayAbstactClass;
class CourseController{
      public function displayDetailsCourse($course):array{
         $course_id=$course->getId();
          $details= new CourseModel;
         return $details->displayDetailsCourse($course_id);
      }
       public function createCourse():bool{
         
        
      }
        public function updateCourse():bool{
     
      }
       public function ArchivedCourse($course):bool{
          $course_id=$course->getId();
          $course_isArchived=$course->getIsArchived();
          $details= new CrudModel;
          return $details->update('courses','is_archived', $course_isArchived, $course_id);
      }

     
       
}

