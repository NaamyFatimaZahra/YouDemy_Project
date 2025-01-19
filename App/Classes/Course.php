<?php

namespace App\Classes;


class Course {
    private int $id;
    private string $title;
    private string $description;
    private string $context;
    private string $publicationDateTime;
    private bool $archived;

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

    public function getContext(): string {
        return $this->context;
    }

    public function setContext(string $context): void {
        $this->context = $context;
    }

    public function getPublicationDateTime(): string {
        return $this->publicationDateTime;
    }

    public function setPublicationDateTime(string $publicationDateTime): void {
        $this->publicationDateTime = $publicationDateTime;
    }

    public function isArchived(): bool {
        return $this->archived;
    }

    public function setArchived(bool $archived): void {
        $this->archived = $archived;
    }
}
