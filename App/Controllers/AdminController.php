<?php
namespace App\Controllers;
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';
use App\Models\CrudModel;
use App\Controllers\DisplayAbstactClass;
class AdminController extends DisplayAbstactClass{
      public function displayCourses():array{
         $Tags= new CrudModel;
         return $Tags->display('courses');
        
      }
       public function displayUsers():array{
         $Tags= new CrudModel;
         return $Tags->display('users');
        
      }
       public function deleteUsers($user):bool{
        $id= $user->getId();
         
         $users= new CrudModel;
        return $users->delete('users',$id);
        
      }
}

