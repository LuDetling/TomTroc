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

    public function showBooks(): void
    {
        $bookManager = new BookManager();
        $books = $bookManager->getAllBooks();
        $view = new View('ShowBooks');
        $view->render('ourBooks', ['books' => $books]);
    }

    public function showBook(): void
    {

        $id = Utils::request('id', -1);

        $bookManager = new BookManager();
        $book = $bookManager->getBookById($id);

        if (!$book) {
            throw new Exception("L'article demandé n'existe pas.");
        }

        $view = new View($book->getTitle());
        $view->render('detailBook', ['book' => $book]);
    }
}
