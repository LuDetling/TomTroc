<?php

class Book extends AbstractEntity
{
    private string $title = "";
    private string $author = "";
    private string $img;
    private string $description;
    private bool $disponibility;


    /**
     * Getter pour le titre du livre.
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Setter pour le titre du livre.
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function getImg(): string
    {
        return $this->img;
    }

    public function setImg(string $img): void
    {
        $this->img = $img;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDisponibility(): string
    {
        return $this->disponibility;
    }

    public function setDisponibility(bool $disponibility): void
    {
        $this->disponibility = $disponibility;
    }
}
