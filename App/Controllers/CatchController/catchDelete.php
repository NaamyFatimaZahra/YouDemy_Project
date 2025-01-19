<?php
// Include necessary files
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';

use App\Controllers\TagController;
use App\Controllers\CategoryController;
use App\Classes\Tag;

use App\Classes\Category;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $typePost=$_POST['typePost'];
    $Id = $_POST['id'];

if( $typePost=$_POST['typePost']==='tags'){
       $Object=new Tag($Id,'');
    $controller = new TagController();
    $deleted=$controller->deleteTag($Object);
    if($deleted===true){
       $_SESSION['messageSuccess']="deleted successfully.";
      header("Location:".BASE_PATH."/App/Views/admin/TagsPage.php");  // Change this to your actual tags page URL
    exit;
    }else{
      header("Location:".BASE_PATH."/App/Views/Errors/500.php");  // Change this to your actual tags page URL
    exit;
    }
}elseif( $typePost=$_POST['typePost']==='category'){
       $Object=new Category($Id,'');
    $controller = new CategoryController();
    $deleted=$controller->deleteCategory($Object);
    if($deleted===true){
       $_SESSION['messageSuccess']="deleted successfully.";
      header("Location:".BASE_PATH."/App/Views/admin/CategoriesPage.php");  // Change this to your actual tags page URL
    exit;
    }else{
      header("Location:".BASE_PATH."/App/Views/Errors/500.php");  // Change this to your actual tags page URL
    exit;
    }
}

    
  
      // Redirect back to the tags page after deletion
   
} 