<?php
class Course {
    private $id;
    private string $title;
    private string $description;
    private string $content;
    private DateTime $datePublication;
    private bool $isArchived;

    public function __construct($id, string $title, string $description, string $content, DateTime $datePublication, bool $isArchived = false) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->content = $content;
        $this->datePublication = $datePublication;
        $this->isArchived = $isArchived;
    }

    public function getId() { 
        return $this->id; 
    } 

    public function getTitle() { 
        return $this->title; 
    }

    public function getDescription() { 
        return $this->description; 
    }

    public function getContent() { 
        return $this->content; 
    }

    public function getDatePublication(): DateTime { 
        return $this->datePublication; 
    }

    public function isArchived(): bool { 
        return $this->isArchived; 
    }

    // Setters
    public function setTitle(string $title) { 
        $this->title = $title; 
    }

    public function setDescription(string $description) { 
        $this->description = $description; 
    }

    public function setContent(string $content) { 
        $this->content = $content; 
    }

    public function setDatePublication(DateTime $datePublication) { 
        $this->datePublication = $datePublication; 
    }

    public function setArchived(bool $isArchived) { 
        $this->isArchived = $isArchived; 
    }

   

}

