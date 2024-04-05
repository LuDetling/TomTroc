<?php

require_once 'config/config.php';
require_once 'config/autoload.php';

// On récupère l'action demandée par l'utilisateur.
// Si aucune action n'est demandée, on affiche la page d'accueil.
$action = Utils::request('action', 'home');

//supprimer les erreurs quand on change de page ?
unset($_SESSION["error"]);
unset($_SESSION["errorImg"]);
// Try catch global pour gérer les erreurs
try {
    // Pour chaque action, on appelle le bon contrôleur et la bonne méthode.
    switch ($action) {
            // Pages accessibles à tous.
        case 'home':
            $bookController = new BookController();
            $bookController->showHome();
            break;
        case 'showBooks':
            $bookController = new BookController();
            $bookController->showBooks();
            break;
        case 'showBook':
            $bookController = new BookController();
            $bookController->showBook();
            break;
        case 'editBook':
            if (!isset($_SESSION["user"]))
                Utils::redirect("connexion");
            $bookController = new BookController();
            $bookController->editBook();
            break;
        case 'addBook':
            if (!isset($_SESSION["user"]))
                Utils::redirect("connexion");
            $bookController = new BookController();
            $bookController->addBook();
            break;
        case 'deleteBook':
            if (!isset($_SESSION["user"]))
                Utils::redirect("connexion");
            $bookController = new BookController();
            $bookController->deleteBook();
            break;
        case 'inscription':
            $adminController = new AdminController();
            $adminController->inscription();
            break;
        case 'connexion':
            $adminController = new AdminController();
            $adminController->connexion();
            break;
        case 'logout':
            unset($_SESSION["user"]);
            unset($_SESSION["error"]);
            Utils::redirect("home");
            break;
        case "profil":
            if (!isset($_SESSION["user"]))
                Utils::redirect("connexion");
            $userController = new UserController();
            $userController->showProfil();
            break;
        case "messagerie":
            if (!isset($_SESSION["user"]))
                Utils::redirect("connexion");
            $messagerieController = new MessagerieController();
            $messagerieController->showAllUserWhoChat();
            break;
        case "profilPublic":
            $userController = new UserController();
            $userController->showProfilPublic();
            break;
        default:
            throw new Exception("La page demandée n'existe pas.");
    }
} catch (Exception $e) {
    // En cas d'erreur, on affiche la page d'erreur.
    $errorView = new View('Erreur');
    $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
}
