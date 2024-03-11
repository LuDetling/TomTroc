<?php

class MessagerieController
{

    public function showAllUserWhoChat()
    {

        // user connecté
        $userFrom = unserialize($_SESSION["user"]);
        $messages = null;
        //user qu'on discute
        $userTo = null;
        $idUserTo = Utils::request('idUserTo', -1);

        $messagerieManager = new MessagerieManager();
        $userManager = new UserManager();

        $usersChat = $messagerieManager->showAllUserWhoChat($userFrom->getId());


        if ($idUserTo > 0) {

            $messages = $messagerieManager->findMessageWithUserTo($userFrom->getId(), $idUserTo);
            $userTo = $userManager->findUserTo($idUserTo);

            if (isset($_POST["message"]) && strlen($_POST["message"]) > 0) {

                $newMessage = new Messagerie([
                    "user_to" => $idUserTo,
                    "user_from" => $userFrom->getId(),
                    "message" => $_POST["message"]
                ]);
                $_SESSION["message"] = $idUserTo;
                $messagerieManager->sendNewMessage($newMessage);
                Utils::redirect("messagerie&idUserTo=" . $idUserTo);
            }
        }

        $view = new View("Messagerie");
        $view->render("messagerie", ['usersChat' => $usersChat, "messages" => $messages, "userTo" => $userTo]);
    }
}
