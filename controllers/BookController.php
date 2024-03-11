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
        $userManager = new userManager();
        $sessionUser = null;

        $book = $bookManager->getBookById($id);

        if (!$book) {
            throw new Exception("L'article demandé n'existe pas.");
        }

        $user = $userManager->findUserTo($book->getUserId());
        if (isset($_SESSION["user"])) {
            $sessionUser = unserialize($_SESSION["user"]);
        }


        $view = new View($book->getTitle());
        $view->render('detailBook', ['book' => $book, "user" => $user, "sessionUser" => $sessionUser]);
    }

    public function editBook(): void
    {
        $id = Utils::request('id', -1);

        $bookManager = new BookManager();
        $book = $bookManager->getBookById($id);

        if (!$book) {
            throw new Exception("L'article demandé n'existe pas.");
        }

        if (isset($_POST["author"])) {
            if (isset($_FILES["img"])) {

                $name = $_FILES["img"]["name"];
                $size = $_FILES["img"]["size"];
                $tmpName = $_FILES["img"]["tmp_name"];
                $error = $_FILES["img"]["error"];

                $tabExtension = explode('.', $name);
                $extension = strtolower(end($tabExtension));
                $extensions = ["jpg", "png", "jpeg"];
                $maxSize = 4000000;

                $file = $book->getImg();

                if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {

                    $uniqueName = uniqid("", true);
                    $file = $uniqueName . "." . $extension;

                    move_uploaded_file($tmpName, './upload/books/' . $file);

                    unset($_SESSION["errorImg"]);
                    unlink("./upload/books/" . $book->getImg());
                } else {
                    $_SESSION["errorImg"] = "Il y a une erreur avec l'image";
                }

                $editBook = new Book([
                    "id" => $book->getId(),
                    "title" => $_POST["title"],
                    "author" => $_POST["author"],
                    "description" => $_POST["description"],
                    "disponibility" => $_POST["disponibility"],
                    "img" => $file,
                ]);

                $bookManager->editBook($editBook);
                Utils::redirect("showBook&id=" . $book->getId());
            }
        }

        $view = new View($book->getTitle());
        $view->render('editBook', ['book' => $book]);
    }

    public function addBook(): void
    {
        $user = unserialize($_SESSION["user"]);
        $userId = $user->getId();

        $bookManager = new BookManager();

        if (isset($_POST["author"])) {
            if (isset($_FILES["img"])) {

                $name = $_FILES["img"]["name"];
                $size = $_FILES["img"]["size"];
                $tmpName = $_FILES["img"]["tmp_name"];
                $error = $_FILES["img"]["error"];

                $tabExtension = explode('.', $name);
                $extension = strtolower(end($tabExtension));
                $extensions = ["jpg", "png", "jpeg"];
                $maxSize = 4000000;

                if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {

                    $uniqueName = uniqid("", true);
                    $file = $uniqueName . "." . $extension;

                    move_uploaded_file($tmpName, './upload/books/' . $file);

                    unset($_SESSION["errorImg"]);
                } else {
                    $_SESSION["errorImg"] = "Il y a une erreur avec l'image";
                }

                $editBook = new Book([
                    "userId" => $userId,
                    "title" => $_POST["title"],
                    "author" => $_POST["author"],
                    "description" => $_POST["description"],
                    "disponibility" => $_POST["disponibility"],
                    "img" => $file,
                ]);

                $bookManager->addBook($editBook);
                // Utils::redirect("showBook&id=" . $book->getId());
            }
        }

        $view = new View("addBook");
        $view->render('addBook');
    }
}
