<?php
// Include necessary files
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';

use App\Controllers\AdminController;
use App\Classes\Tag;
use App\Classes\Teacher;
use App\Classes\Student;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_POST['id'];
    $userRole = $_POST['role'];
   if($userRole=2){
    $UserObject=new Student($userId,'', '', '','student');
   }elseIf($userRole=3){
        $UserObject=new Teacher($userId,'', '', '','teacher');
   }


    $controller = new AdminController();
    $deleted=$controller->deleteUsers($UserObject);
    if($deleted===true){
         $_SESSION['messageSuccess']="USER WAS DELETED SUCCESSFULLY.";
      header("Location:".BASE_PATH."/App/Views/admin/AllUsers.php");  // Change this to your actual tags page URL
    exit;
    }else{
         $_SESSION['messageNotSuccess']="USER WAS NOT DELETED.";
      header("Location:".BASE_PATH."/App/Views/Errors/500.php");  // Change this to your actual tags page URL
    exit;
    }
   
   
} 