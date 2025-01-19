<?php
// Include necessary files
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';

use App\Controllers\TagController;
use App\Models\CrudModel;
use App\Classes\Tag;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $id = $_POST['id'] ;
    $nameUpdated = $_POST['update_name'] ;
     $TagObject=new Tag($id,$nameUpdated);
     $checkIfTagExist=new CrudModel();
     $rowTag= $checkIfTagExist->checkExintence('tags','id',$id);

    if( $rowTag['name']==$nameUpdated){
    $_SESSION['messageNotSuccess']="this tag already exist.";
    header("Location:".BASE_PATH."/App/Views/admin/TagsPage.php");
   }else{
    $controller=new TagController();
    $update= $controller->updateTag($TagObject);
     if( $update===true){
    $_SESSION['messageSuccess']="UPDATED STATUS successfully.";
      header("Location:".BASE_PATH."/App/Views/admin/TagsPage.php");  // Change this to your actual tags page URL
    exit;
    }else{
      $_SESSION['messageNotSuccess']="OOPS! NOT UPDATED STATUS.";
       header("Location:".BASE_PATH."/App/Views/admin/TagsPage.php");  // Change this to your actual tags page URL
    exit;
    }
  } 
}

   