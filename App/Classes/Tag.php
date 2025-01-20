<?php
namespace App\Classes;
include_once "../../../vendor/autoload.php";

class Tag{
      private int $id;
      private string $name;
       
      public function __construct(int $id=NULL,$name='') {
        $this->id = $id;
        $this->name = $name;
      }
      public function getId():int{
         return $this->id;
      }
        public function getName():string{
         return $this->name;
      }

         public function setId($id):void{
         $this->id=$id;
      }
        public function setName($name):void{
          $this->name=$name;
      }

}