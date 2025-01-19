<?php
namespace App\Classes;


abstract class User {

    protected string $id;
    protected string $name;
    protected string $email;
    protected string $password;
    protected string $role;
    protected string $AccountStatus;


    // Constructor
    public function __construct(string $id, string $name , string $email , string $password ,string $role,string $AccountStatus='') {
      
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->AccountStatus = $AccountStatus;
    }


    public function getId(): string {
        return $this->id;
    }

    public function setId(string $id): void {
        $this->id = $id;
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
      
    public function getRole(): string {
        return $this->role;
    }

    public function setRole(string $role): void {
        $this->role = $role;
    }
 
    
  public function getAccountStatus(): string {
        return $this->AccountStatus;
    }

    public function setAccountStatus(string $AccountStatus): void {
        $this->AccountStatus = $AccountStatus;
    }
    
}

?>
