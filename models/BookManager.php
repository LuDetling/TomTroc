<?php

class BookManager extends AbstractEntityManager
{
    public function getAllBooks(): array
    {
        $sql = "SELECT * FROM book";
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
}
