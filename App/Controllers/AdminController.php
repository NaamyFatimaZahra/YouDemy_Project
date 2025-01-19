<?php
namespace App\Controllers;
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';
use App\Models\CrudModel;
use App\Controllers\DisplayAbstactClass;
class AdminController extends DisplayAbstactClass{
      public function displayCourses():array{
         $courses= new CrudModel;
         return $courses->display('courses');
        
      }
       public function displayUsers():array{
         $Tags= new CrudModel;
         return $Tags->displayTwoTable('users','roles','role_id','1=1','1=1');
        
      }
        public function updateStatusUsers($user):bool{
        $nameUpdate=$user->getStatus();
         $userId=$user->getId();
        
         $userUpdate= new CrudModel;
         return $userUpdate-> update('users','status',$nameUpdate, $userId);
       
      }
       public function displayUsersSuspend():array{
         $Tags= new CrudModel;
         return $Tags->displayTwoTable('users','roles','role_id','role_id=2','validation_account="pending" OR validation_account="rejected"');
        
      }

       public function validateTeachers($user):bool{
        $accountStatus=$user->getAccountStatus();
         $userId=$user->getId();
        
         $userUpdate= new CrudModel;
         return $userUpdate-> update('users','validation_account',$accountStatus, $userId);
       
      }
       
}

