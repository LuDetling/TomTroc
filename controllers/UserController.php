<?php

class UserController
{
    public function showProfil(): void
    {
        $user = unserialize($_SESSION["user"]);
        $view = new View('ShowProfil');
        $view->render('profil', ['user' => $user]);
        if (!empty($_POST["email"])  || !empty($_POST["password"]) || !empty($_POST["pseudo"])) {
            $this->editProfil($user);
        }
    }

    //Edit profil
    public function editProfil($user): void
    {
        $userManager = new UserManager();
        $result = $userManager->editUser($user);

        if (!$result) {
            return;
        }
    }
}
