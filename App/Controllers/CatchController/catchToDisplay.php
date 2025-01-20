<?php
// Include necessary files
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $id=$_POST['id_course'];
   // $course=new Course($id);
   // $controller = new CourseController();
   // $detailsCourse= $controller->displayDetailsCourse($course);
   // $_SESSION['details_course']=$detailsCourse;
   header('Location: '.BASE_PATH.'/App/Views/Components/detailsCourse.php');
   exit();
}




   

   