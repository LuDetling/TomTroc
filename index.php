<?php

require_once 'config/config.php';
require_once 'config/autoload.php';

// On récupère l'action demandée par l'utilisateur.
// Si aucune action n'est demandée, on affiche la page d'accueil.
$action = Utils::request('action', 'home');

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
            $userController = new UserController();
            $userController->showProfil();
            break;
        default:
            throw new Exception("La page demandée n'existe pas.");
    }
} catch (Exception $e) {
    // En cas d'erreur, on affiche la page d'erreur.
    $errorView = new View('Erreur');
    $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
}
