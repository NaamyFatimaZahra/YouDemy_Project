<?php
// Include necessary files
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';

use App\Controllers\TagController;
use App\Controllers\AdminController;
use App\Classes\Teacher;
use App\Classes\Student;
use App\Classes\Tag;
use App\Controllers\Statistiques;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $accountStatus = $_POST['accountStatus'];
    $user_role = $_POST['user_role'];
   



    if( $user_role==2){
        $userObject=new Teacher($user_id,'', '', '','teacher',$accountStatus,'');

    }elseif( $user_role==3){
        $userObject=new Student($user_id,'', '', '','student',$accountStatus,'');

    }

      $controller = new AdminController();
      $update=$controller->validateTeachers($userObject);
    if( $update===true){
    $_SESSION['messageSuccess']="UPDATED STATUS ACCOUNT successfully.";
    require_once "../../Views/Layout/header.php";
      header("Location:".BASE_PATH."/App/Views/admin/TeacherRequest.php"); 
    exit;
    }else{
      $_SESSION['messageNotSuccess']="OOPS! NOT UPDATED STATUS ACCOUNT.";
       header("Location:".BASE_PATH."/App/Views/admin/TeacherRequest.php"); 
    exit;
    }
     
   
} 