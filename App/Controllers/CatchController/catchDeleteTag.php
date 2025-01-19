<?php
// Include necessary files
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';

use App\Controllers\TagController;
use App\Classes\Tag;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tagId = $_POST['id'];
    $TagObject=new Tag($tagId,'');
    $controller = new TagController();
    $deleted=$controller->deleteTag($TagObject);
    if($deleted===true){
       $_SESSION['messageSuccess']="deleted successfully.";
      header("Location:".BASE_PATH."/App/Views/admin/TagsPage.php");  // Change this to your actual tags page URL
    exit;
    }else{
      header("Location:".BASE_PATH."/App/Views/Errors/500.php");  // Change this to your actual tags page URL
    exit;
    }
      // Redirect back to the tags page after deletion
   
} 