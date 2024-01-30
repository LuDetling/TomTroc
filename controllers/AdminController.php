<?php

class AdminController
{

    public function connexion(): void
    {
        //verif regex plus tard du coup ne pas faire les erreurs comme ça dans le connexion.php mais avec session["error"]
        if (!empty($_POST["email"]) && !empty($_POST["password"])) {
            $this->loginUser();
        }

        $view = new View("Connexion");
        $view->render("connexion");
        unset($_SESSION["error"]);
    }

    public function loginUser(): void
    {


        $email = $_POST["email"];

        $userManager = new UserManager();
        $user = $userManager->loginUser($email);

        if (!$user) {
            $_SESSION["error"]["email"] = "Pas la bonne email";
            return;
        }

        $password = $_POST["password"];
        if (!password_verify($password, $user->getPassword())) {
            $_SESSION["error"]["password"] = "Le mot de passe est incorrect";
            return;
        }

        $_SESSION["user"] = serialize($user);
        unset($_SESSION["error"]);

        Utils::redirect("home");
    }

    public function checkIfUserIsConnected(): void
    {
        if (!isset($_SESSION["user"])) {
            Utils::redirect("connexion");
        }
    }

    public function inscription(): void
    {
        if (!empty($_POST["pseudo"]) || !empty($_POST["email"]) || !empty($_POST["password"])) {
            $this->createUser();
        }

        $view = new View("Inscription");
        $view->render("inscription");
        unset($_SESSION["error"]);
        unset($_SESSION["user"]);
    }

    public function createUser(): void
    {
        $error = [
            "pseudo" => null,
            "email" => null,
            "password" => null
        ];

        $_SESSION["error"] = $error;
        // mieux vérifier les erreurs

        if (empty($_POST["pseudo"]) || empty($_POST["email"]) || empty($_POST["password"])) {
            $error["pseudo"] = "il manque le pseudo";
            $error["email"] = "il manque le email";
            $_SESSION["error"] = $error;
        }

        //peut monter au dessus de la vérif vu qu'on a déja verif dans la fonction inscription
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
