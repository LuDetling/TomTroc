<?php

class AdminController
{

    /**
     * The function `connexion` checks if email and password are provided in the POST request, then logs
     * in the user and renders the "connexion" view.
     */
    public function connexion(): void
    {
        if (!empty($_POST["email"]) && !empty($_POST["password"])) {
            $this->loginUser();
        }

        $view = new View("Connexion");
        $view->render("connexion");
        unset($_SESSION["error"]);
    }

    /**
     * This PHP function is used to log in a user by verifying their email and password, setting
     * session variables accordingly, and handling errors.
     * 
     * @return void If the email provided by the user does not match any user in the system, the error
     * message "Pas la bonne email" will be stored in the session under the key "error"["email"]. If
     * the password provided by the user does not match the password stored for the user, the error
     * message "Le mot de passe est incorrect" will be stored in the session under the key "error"
     */
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
        unset($_SESSION["error"]);
        unset($_SESSION["vide"]);
        unset($_SESSION["user"]);
        if (!empty($_POST["pseudo"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
            $this->createUser();
        } else if (isset($_POST["pseudo"])) {
            $_SESSION["vide"] = "Tous les champs doivent être renseignés";
        }

        $view = new View("Inscription");
        $view->render("inscription");
    }

    public function createUser(): void
    {
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
