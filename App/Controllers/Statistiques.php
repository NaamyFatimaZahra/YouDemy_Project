<?php
namespace App\Controllers;
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';
use App\Models\CrudModel;

class Statistiques {
      public function Counter($table,$condition):int{
          $controller=new CrudModel;
         return $controller->Count($table,$condition);
      }
       
}

