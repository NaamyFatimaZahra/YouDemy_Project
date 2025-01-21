<?php

namespace App\Classes;

class Course {
    private int $id;
    private string $title;
    private string $description;
    private string $content;
    private string $publicationDateTime;
    private string $updateDateTime;
    private bool $isArchived;

 
    public function __construct(
        int $id = 0,
        string $title = '',
        string $description = '',
        string $content = '',
        string $publicationDateTime = '',
        string $updateDateTime = '',
        bool $isArchived = false
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->content = $content;
        $this->publicationDateTime = $publicationDateTime;
        $this->updateDateTime = $updateDateTime;
        $this->isArchived = $isArchived;
    }

    
    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

  
    public function getTitle(): string {
        return $this->title;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }

 
    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

  
    public function getContent(): string {
        return $this->content;
    }

    public function setContent(string $content): void {
        $this->content = $content;
    }

    
    public function getPublicationDateTime(): string {
        return $this->publicationDateTime;
    }

    public function setPublicationDateTime(string $publicationDateTime): void {
        $this->publicationDateTime = $publicationDateTime;
    }

    public function getUpdateDateTime(): string {
        return $this->updateDateTime;
    }

    public function setUpdateDateTime(string $updateDateTime): void {
        $this->updateDateTime = $updateDateTime;
    }


    public function getIsArchived(): bool {
        return $this->isArchived;
    }

    public function setIsArchived(bool $isArchived): void {
        $this->isArchived = $isArchived;
    }
}
