<?php
namespace App\Classes;

use App\Classes\User;
class Teacher extends User {
    private string $speciality;

    public function __construct(string $id='',string $name, string $email, string $password,string $role, string $speciality='') {
        parent::__construct($id,$name, $email, $password, $role);
        $this->speciality = $speciality;
    }

    // Getter and setter
    public function getSpeciality(): string {
        return $this->speciality;
    }

    public function setSpeciality(string $speciality): void {
        $this->speciality = $speciality;
    }

    // Method
    public function consultationEnrolledStudent(): array {
        // In a real scenario, this might fetch student data from a database
        return ["Student 1", "Student 2", "Student 3"];
    }
}
?>
