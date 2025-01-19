<?php
// Include necessary files
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';

use App\Controllers\TagController;
use App\Controllers\CategoryController;
use App\Models\CrudModel;
use App\Classes\Tag;
use App\Classes\Category;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     $typePost=$_POST['typePost'];
    $nameValue = $_POST['Add_names'] ;
    if( $typePost==='tags'){
     $TagObject=new Tag($id,$nameUpdated);
     $checkIfTagExist=new CrudModel();
     $rowTag= $checkIfTagExist->checkExintence('tags','id',$nameAdd);

    if( $rowTag['name']==$nameUpdated){
    $_SESSION['messageNotSuccess']="This Tag already exist.";
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
}elseif( $typePost==='category'){
     
      $checkIfTagExist=new CrudModel();
     $rowCategory= $checkIfTagExist->checkExintence('categories','name',$nameValue);

    if($rowCategory!==false){
    
    $_SESSION['messageNotSuccess']="This Category already exist.";
    header("Location:".BASE_PATH."/App/Views/admin/CategoriesPage.php");
   }else{
      $CategoryObject=new Category(0,$nameValue);
     
     $controller = new CategoryController();
    $AddValue= $controller->addCategory($CategoryObject);
     if( $AddValue===true){
    $_SESSION['messageSuccess']="UPDATED STATUS successfully.";
      header("Location:".BASE_PATH."/App/Views/admin/CategoriesPage.php");  // Change this to your actual tags page URL
    exit;
    }else{
      $_SESSION['messageNotSuccess']="OOPS! NOT UPDATED STATUS.";
       header("Location:".BASE_PATH."/App/Views/admin/CategoriesPage.php");  // Change this to your actual tags page URL
    exit;
    }
}
}


}




   

   