<?php

class BookManager extends AbstractEntityManager
{
    public function getAllBooks(): array
    {
        // faire une pagination à 16 books par page
        $sql = "SELECT * FROM book ORDER BY id DESC";
        $result = $this->db->query($sql);
        $books = [];

        foreach ($result as $row) {
            $books[] = new Book($row);
        }

        return $books;
    }

    public function getLastedBooks(): array
    {
        $sql = "SELECT * FROM book ORDER BY id DESC LIMIT 4";
        $result = $this->db->query($sql);
        $lastsbooks = [];

        foreach ($result as $row) {
            $lastsbooks[] = new Book($row);
        }
        return $lastsbooks;
    }

    public function getBookById(int $id): ?Book
    {
        $sql = "SELECT * FROM book WHERE id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $book = $result->fetch();
        if ($book) {
            return new Book($book);
        }
        return null;
    }

    public function getBookByUserId(int $id): array
    {
        $sql = "SELECT * FROM book WHERE userId = :userId";
        $result = $this->db->query($sql, ['userId' => $id]);
        $books = [];
        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    }

    public function editBook(Book $book): void
    {
        $sql = "UPDATE book SET title = :title, author = :author, description = :description, disponibility = :disponibility, img = :img WHERE id = :id";
        $this->db->query($sql, [
            "id" => $book->getId(),
            "title" => htmlspecialchars($book->getTitle()),
            "author" => htmlspecialchars($book->getAuthor()),
            "description" => htmlspecialchars($book->getDescription()),
            "disponibility" => htmlspecialchars($book->getDisponibility()),
            "img" => $book->getImg(),
        ]);
    }
}
