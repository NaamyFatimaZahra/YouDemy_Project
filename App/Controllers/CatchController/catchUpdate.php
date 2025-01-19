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
    $update=new TagController();
     $update->updateTag($TagObject);
    $_SESSION['messageSuccess']="added successfully.";
    header("Location:".BASE_PATH."/App/Views/admin/TagsPage.php");
   }
  
} 

   