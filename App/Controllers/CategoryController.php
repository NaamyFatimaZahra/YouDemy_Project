<?php
namespace App\Controllers;
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';
use App\Models\CrudModel;
class CategoryController{
      public function displayCategory():array{
        $Categories= new CrudModel;
         return $Categories->display('Categories');
           
      }
          public function deleteCategory($Category) {
        $CategoryId= $Category->getId();  
        $delete = new CrudModel();
        return $delete->delete('Categories',$CategoryId);
    }

       public function updateCategory($Category) {
      $CategoryId= $Category->getId(); 
      $CategoryName= $Category->getName();
     
      $update=new CrudModel();
      return $update->update('Categories','name',$CategoryName,$CategoryId);
    }



      public function addCategory($Category) { 
      $CategoryName= $Category->getName();
      $addCategory=new CrudModel();
      return $addCategory->addValue('categories','name',$CategoryName);
    }
}