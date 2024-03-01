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

        $avatar = $user->getAvatar();
        if (isset($_FILES["avatar"])) {

            $name = $_FILES["avatar"]["name"];
            $size = $_FILES["avatar"]["size"];
            $tmpName = $_FILES["avatar"]["tmp_name"];
            $error = $_FILES["avatar"]["error"];

            $tabExtension = explode('.', $name);
            $extension = strtolower(end($tabExtension));
            $extensions = ["jpg", "png", "jpeg"];
            $maxSize = 4000000;

            if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {

                $uniqueName = uniqid("", true);
                $avatar = $uniqueName . "." . $extension;

                move_uploaded_file($tmpName, './upload/avatar/' . $avatar);

                unset($_SESSION["errorImg"]);
                if ($user->getAvatar() != "default-avatar.png") {
                    unlink("./upload/avatar/" . $user->getAvatar());
                }
            } else {
                $_SESSION["errorImg"] = "Il y a une erreur avec l'image";
            }
        }

        $editUser = new User([
            "id" => $user->getId(),
            "dateCreation" => $user->getDateCreation(),
            "email" => $_POST["email"],
            "password" => password_hash($_POST["password"], PASSWORD_BCRYPT),
            "pseudo" => $_POST["pseudo"],
            "avatar" => $avatar,
        ]);
        unset($_SESSION["error"]);

        $userManager = new UserManager();
        $userEdited = $userManager->editUser($editUser, $user);
        return $userEdited;
    }
}
