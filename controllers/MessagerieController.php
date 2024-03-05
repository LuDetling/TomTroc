<?php

class MessagerieController
{

    public function showYourMessages()
    {
        $view = new View("Messagerie");
        $view->render("messagerie");
    }
}
