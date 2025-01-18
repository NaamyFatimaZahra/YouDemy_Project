<?php
// Include necessary files
include_once '../../config/config.php';
include_once '../../Controllers/TagController.php';

use App\Controllers\TagController;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tagId = $_POST['id'];

    $controller = new TagController();
    $deleted=$controller->deleteTag($tagId);
    if($deleted===true){
      header("Location:".BASE_PATH."/App/Views/admin/TagsPage.php");  // Change this to your actual tags page URL
    exit;
    }else{
      header("Location:".BASE_PATH."/App/Views/Errors/500.php");  // Change this to your actual tags page URL
    exit;
    }
      // Redirect back to the tags page after deletion
   
} 