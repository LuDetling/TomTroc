<?php

class AdminController
{

    public function connexion(): void
    {
        $view = new View("Connexion");
        $view->render("connexion");
    }
    public function inscription(): void
    {
        if (!empty($_POST["pseudo"]) || !empty($_POST["email"]) || !empty($_POST["password"])) {
            $this->newUser();
        }
        $view = new View("Inscription");
        $view->render("inscription");
        unset($_SESSION["error"]);
        unset($_SESSION["user"]);
    }
    public function newUser(): void
    {
        $error = [
            "pseudo" => null,
            "email" => null,
            "password" => null
        ];

        $_SESSION["error"] = $error;

        if (empty($_POST["pseudo"]) || empty($_POST["email"]) || empty($_POST["password"])) {
            $error["pseudo"] = "il manque le pseudo";
            $error["email"] = "il manque le email";
            $_SESSION["error"] = $error;
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
        $result = $userManager->createUser($user);

        if (!$result) {
            return;
        }

        Utils::redirect("connexion");
    }
}
