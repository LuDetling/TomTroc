<?php

class UserController
{
    public function showProfil(): void
    {
        $user = unserialize($_SESSION["user"]);

        if (!empty($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["pseudo"])) {
            $user = $this->editProfil($user);
        } else {
            $_SESSION["error"] = "Vous avez un champ vide";
        }

        $bookManager = new BookManager();
        // $books = $bookManager->getBookByUserId();

        $view = new View('ShowProfil');
        $view->render('profil', ['user' => $user]);
    }

    //Edit profil
    public function editProfil(User $user): User
    {
        $editUser = new User([
            "id" => $user->getId(),
            "email" => $_POST["email"],
            "password" => password_hash($_POST["password"], PASSWORD_BCRYPT),
            "pseudo" => $_POST["pseudo"]
        ]);
        $_SESSION["user"] = serialize($editUser);
        unset($_SESSION["error"]);

        $userManager = new UserManager();
        $userManager->editUser($user);
        return $editUser;
    }
}
