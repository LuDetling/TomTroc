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

        if (isset($_POST["search"])) {
            $books = $bookManager->getBooksBySearch($_POST["search"]);
        }

        $view = new View('ShowBooks');
        $view->render('ourBooks', ['books' => $books]);
    }

    public function showBook(): void
    {

        $id = (int) Utils::request('id', -1);

        $bookManager = new BookManager();
        $userManager = new userManager();
        $sessionUser = null;

        if (!is_int($id)) {
            throw new Exception("L'article demandé n'existe pas.");
        }

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
        unset($_SESSION["error"]);

        $bookManager = new BookManager();
        $book = $bookManager->getBookById($id);
        $user = unserialize($_SESSION["user"]);

        if (!$book) {
            throw new Exception("L'article demandé n'existe pas.");
        } else if ($book && $book->getUserId() != $user->getId()) {
            throw new Exception("Vous n'êtes pas authorisé à modifier ce livre.");
        }

        if (!empty($_POST["author"]) && !empty($_POST["title"]) && !empty($_POST["description"]) && !empty($_POST["disponibility"]) && !empty($_FILES["img"])) {

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

                move_uploaded_file($tmpName, './public/upload/books/' . $file);

                unset($_SESSION["errorImg"]);
                unlink("./public/upload/books/" . $book->getImg());
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
        } else {
            $_SESSION["error"] = "Tous les champs doivent être remplit";
        }

        $view = new View($book->getTitle());
        $view->render('editBook', ['book' => $book]);
    }

    public function addBook(): void
    {
        $user = unserialize($_SESSION["user"]);
        $userId = $user->getId();

        $bookManager = new BookManager();
        if (!empty($_POST["author"]) && !empty($_POST["title"]) && !empty($_POST["description"]) && !empty($_POST["disponibility"]) && !empty($_FILES["img"])) {


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

                move_uploaded_file($tmpName, './public/upload/books/' . $file);

                unset($_SESSION["errorImg"]);
            } else {
                $_SESSION["errorImg"] = "Il y a une erreur avec l'image";
            }

            $addBook = new Book([
                "userId" => $userId,
                "title" => $_POST["title"],
                "author" => $_POST["author"],
                "description" => $_POST["description"],
                "disponibility" => $_POST["disponibility"],
                "img" => $file,
            ]);

            $idNewBook = $bookManager->addBook($addBook);
            Utils::redirect("showBook&id=" . $idNewBook);
        } else {
            $_SESSION["error"] = "Tous les champs doivent être remplit";
        }

        $view = new View("addBook");
        $view->render('addBook');
    }

    public function deleteBook(): void
    {
        $id = Utils::request('id', -1);
        $user = unserialize($_SESSION["user"]);

        $bookManager = new BookManager();

        $book = $bookManager->getBookById($id);

        if (isset($book) && $book->getUserId() == $user->getId()) {
            $bookManager->deleteBook($id);
        } else {
            throw new Exception("Vous n'êtes pas autorisé à supprimer ce livre.");
        }

        Utils::redirect("profil");
    }
}
