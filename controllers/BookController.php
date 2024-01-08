<?php

class BookController
{

    public function showHome(): void
    {
        $bookManager = new BookManager();
        $lastBooks = $bookManager->getLastedBooks();

        $view = new View("Home");
        $view->render("home", ['books' => $lastBooks]);
    }
}
