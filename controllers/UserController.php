<?php

class UserController
{
    public function showProfil(): void
    {
        $user = unserialize($_SESSION["user"]);

        if (!empty($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["pseudo"])) {
            $user = $this->editProfil($user);
            $_SESSION["user"] = serialize($user);
        } else if (isset($_POST["password"])) {
            $_SESSION["error"] = "Vous avez un champ vide";
        }

        $bookManager = new BookManager();
        $books = $bookManager->getBookByUserId($user->getId());

        $view = new View('ShowProfil');
        $view->render('profil', ['user' => $user, 'books' => $books]);
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
        unset($_SESSION["error"]);

        $userManager = new UserManager();
        $userEdited = $userManager->editUser($editUser, $user);
        return $userEdited;
    }
}
