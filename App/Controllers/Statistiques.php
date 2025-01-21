<?php
namespace App\Controllers;
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';
use App\Models\CrudModel;
use App\Models\StatistiqueModel;

class Statistiques {
        public function total($table):int{
        $controller=new StatistiqueModel();
         return $controller->CountTotal($table);  
      }  
       public function topCourseID(){
        $controller=new StatistiqueModel();
         return $controller->topCourse();  
      } 
        public function treeTopTeachers():array{
        $controller=new StatistiqueModel();
         return $controller->treeTop();  
      } 
       
         public function totalforSpecificTeacher($table,$condition1,$condition2):int{
        $controller=new StatistiqueModel();
         return $controller->CountTotalForSpecificTeacher($table,$condition1,$condition2);  
      } 

        
}

