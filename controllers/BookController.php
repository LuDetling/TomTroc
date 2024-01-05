<?php

class BookController
{

    public function showHome(): void
    {
        $view = new View("Home");
        $view->render("home");
    }
}
