<?php

class AdminController
{
    public function inscription(): void
    {
        $view = new View("Inscription");
        $view->render("inscription");
    }

    public function connexion(): void
    {
        $view = new View("Connexion");
        $view->render("connexion");
    }
    public function newUser(): void
    {
        if (empty($_POST["pseudo"]) || empty($_POST["email"]) || empty($_POST["password"])) {
            throw new Exception("Tous les champs sont obligatoires.");
        }

        $pseudo = $_POST["pseudo"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = new User([
            'pseudo' => $pseudo,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ]);

        $userManager = new UserManager();
        $result = $userManager->newUser($user);

        if (!$result) {
            throw new Exception("Une erreur est survenue lors de la création de votre compte.");
        }

        Utils::redirect("home");
    }
}
