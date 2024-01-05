<?php

class BookManager extends AbstractEntityManager
{
    public function getAllBook(): array
    {
        $sql = "SELECT * FROM book";
        $result = $this->db->query($sql);
        $books = [];

        return $books;
    }
}
