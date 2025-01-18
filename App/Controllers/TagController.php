<?php
namespace App\Controllers;
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';
use App\Models\CrudModel;
class TagController{
      public function displayTags():array{
       
        $Tags= new CrudModel;
         return $Tags->display('tags');
           
      }
          public function deleteTag($tagId) {
        $tagModel = new CrudModel();
        return $tagModel->delete('tags',$tagId);
      

    }

   

}