<?php
namespace App\Controllers;
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';
use App\Models\StudentModel;
use App\Controllers\DisplayAbstactClass;
class StudentController extends DisplayAbstactClass{
      public function displayCourses():array{
         $courses= new StudentModel();
         return $courses->displayAllCourse();
      }
      public function checkEnrollmentStudent($id_user,$id_course){
          $enrollment= new StudentModel();
         return $enrollment->checkEnrollment($id_user,$id_course);
      }
}