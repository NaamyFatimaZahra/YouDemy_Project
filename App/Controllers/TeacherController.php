<?php
namespace App\Controllers;
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';
use App\Models\TeacherModel;
use App\Controllers\DisplayAbstactClass;
class TeacherController extends DisplayAbstactClass{
      public function displayCourses():array{
         $courses= new TeacherModel;
         return $courses->displayAllCourse('courses','users','teacher_id','categories','category_id',$_SESSION['user']['id']);
        
      }
   
       
}

