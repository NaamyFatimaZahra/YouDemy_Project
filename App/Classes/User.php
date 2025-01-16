<?php

abstract class User {
  
    protected string $name;
    protected string $email;
    protected string $password;

    // Constructor
    public function __construct( string $name , string $email , string $password ) {
      
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }


    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    
    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }
}

?>
