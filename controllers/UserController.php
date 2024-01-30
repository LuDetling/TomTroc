<?php

class UserController
{
    public function showProfil(): void
    {
        $user =  $_SESSION["user"];
        $view = new View('ShowProfil');
        $view->render('profil', ['profil' => $user]);
    }
}
