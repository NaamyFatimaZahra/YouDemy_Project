<?php
namespace App\Controllers;
include_once '../../config/config.php';
include_once '../../../vendor/autoload.php';
use App\Models\CrudModel;
class AdminController{
      public function displayCourses(){
         new CrudModel;
      }
}

