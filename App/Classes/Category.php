<?php
namespace App\Classes;

include_once "../../../vendor/autoload.php";

class Category {
    private int $id;
    private string $name;

    // Constructor to initialize properties
    public function __construct(int $id = NULL, string $name = '') {
        $this->id = $id;
        $this->name = $name;
    }

    // Getter for id
    public function getId(): int {
        return $this->id;
    }

    // Setter for id
    public function setId(int $id): void {
        $this->id = $id;
    }

    // Getter for name
    public function getName(): string {
        return $this->name;
    }

    // Setter for name
    public function setName(string $name): void {
        $this->name = $name;
    }
}
