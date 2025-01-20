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
          public function deleteTag($Tag) {
        $tagId= $Tag->getId();  
        $delete = new CrudModel();
        return $delete->delete('tags',$tagId);
    }

       public function updateTag($Tag) {
      $tagId= $Tag->getId(); 
      $tagName= $Tag->getName();
     
      $update=new CrudModel();
      return $update->update('tags','name',$tagName,$tagId);
       

    }
     public function add($Tag) {
      $tagId= $Tag->getId(); 
      $tagName= $Tag->getName();
     
      $update=new CrudModel();
      // return $update->addTags('tags','name',$tagName,$tagId);
      return $update->addTags($tagName);
    }
     public function displayTagsOfCourse($id):array{
       
        $Tags= new CrudModel;
         return $Tags->displayTags($id);
           
      }

}