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
         return $Tags->displayTwoTable('users','roles','role_id');
        
      }
        public function updateStatusUsers($user):bool{
        $nameUpdate=$user->getStatus();
         $userId=$user->getId();
        
         $userUpdate= new CrudModel;
         return $userUpdate-> update('users','status',$nameUpdate, $userId);
       
      }
       
}

