<?php
// Include necessary files
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';

use App\Controllers\TagController;
use App\Controllers\AdminController;
 use App\Classes\Teacher;
 use App\Classes\Student;
use App\Classes\Tag;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $status = $_POST['status'];
    $user_role = $_POST['user_role'];
   



    if( $user_role==2){
        $userObject=new Teacher($user_id,'', '', '','teacher','',$status);

    }elseif( $user_role==3){
        $userObject=new Student($user_id,'', '', '','student','',$status);

    }

      $controller = new AdminController();
      $update=$controller->updateStatusUsers($userObject);
    if( $update===true){
    $_SESSION['messageSuccess']="UPDATED STATUS successfully.";
      header("Location:".BASE_PATH."/App/Views/admin/AllUsers.php");  // Change this to your actual tags page URL
    exit;
    }else{
      $_SESSION['messageNotSuccess']="OOPS! NOT UPDATED STATUS.";
       header("Location:".BASE_PATH."/App/Views/admin/AllUsers.php");  // Change this to your actual tags page URL
    exit;
    }
     
   
} 