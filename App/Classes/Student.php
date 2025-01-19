<?php
namespace App\Classes;


class Student extends User {
    private string $linkGithub;
    private string $linkLinkedin;
    private string $phoneNumber;
    private string $image;

    public function __construct(string $id='',string $name, string $email, string $password,string $role,string $AccountStatus='', string $linkGithub='', string $linkLinkedin='', string $phoneNumber='', string $image='') {
       parent::__construct($id,$name, $email, $password, $role,$AccountStatus);
        $this->linkGithub = $linkGithub;
        $this->linkLinkedin = $linkLinkedin;
        $this->phoneNumber = $phoneNumber;
        $this->image = $image;
    }

    // Getters and setters
    public function getLinkGithub(): string {
        return $this->linkGithub;
    }

    public function setLinkGithub(string $linkGithub): void {
        $this->linkGithub = $linkGithub;
    }

    public function getLinkLinkedin(): string {
        return $this->linkLinkedin;
    }

    public function setLinkLinkedin(string $linkLinkedin): void {
        $this->linkLinkedin = $linkLinkedin;
    }

    public function getPhoneNumber(): string {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): void {
        $this->phoneNumber = $phoneNumber;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function setImage(string $image): void {
        $this->image = $image;
    }

    // Methods
    public function enrolledCourse(): void {
        echo $this->name . " has enrolled in a course.\n";
    }

    public function quitCourse(): void {
        echo $this->name . " has quit a course.\n";
    }
}
?>
