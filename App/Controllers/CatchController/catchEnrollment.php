<?php
include_once '../../config/config.php';
require_once '../../../vendor/autoload.php';
 use App\Controllers\StudentController;
 
use App\Models\CrudModel;
 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 $user_id=$_SESSION['user']['id'];
 $course_id=$_POST['course_id'];
 $TypePost=$_POST['typePoste'];

if($TypePost==='enrolled'){
      $controller=new StudentController();
      $added=$controller->addEnrollment($user_id,$course_id);
        header("Location: " .BASE_PATH."/App/Views/Components/detailsCourse.php");
}


}
?>
