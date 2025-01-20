<?php
// Include necessary files
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';


use App\Controllers\CourseController;
 use App\Classes\Course;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_id = $_POST['course_id'];
    $isArchived = $_POST['archived'];
    

    if( $isArchived==='Archived'){
        $userObject=new Course($course_id,'', '', '','','',1);

    }elseif($isArchived==='NOT Archived'){
        $userObject=new Course($course_id,'', '', '','','',0);
    }

      $controller = new CourseController();
      $update=$controller->ArchivedCourse($userObject);
    if( $update===true){
    $_SESSION['messageSuccess']="UPDATED  successfully.";
   
      header("Location:".BASE_PATH."/App/Views/Components/detailsCourse.php");  // Change this to your actual tags page URL
    exit();
    }else{
      $_SESSION['messageNotSuccess']="OOPS! NOT UPDATED .";
       header("Location:".BASE_PATH."/App/Views/Components/detailsCourse.php");  // Change this to your actual tags page URL
    exit();
    }
     
   
} 