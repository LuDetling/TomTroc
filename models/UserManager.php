<?php

class UserManager extends AbstractEntityManager
{
    public function createUser(User $user): bool
    // public function newUser(User $user): bool
    {
        //Vérification si le pseudo et email son unique
        //lower
        $sqlUser = "SELECT pseudo, email FROM user WHERE pseudo = :pseudo OR email = :email";
        $resultUser = $this->db->query($sqlUser, [
            'pseudo' => $user->getPseudo(),
            'email' => $user->getEmail()
        ]);
        $users = [];
        foreach ($resultUser as $row) {
            $users[] = new User($row);

            if (strtolower($user->getPseudo()) == strtolower($row["pseudo"]) && strtolower($user->getEmail()) == strtolower($row["email"])) {
                $_SESSION["error"]["pseudo"] = "Ce pseudo est déja utilisé";
                $_SESSION["error"]["email"] = "Cette email est déja utilisée";
            } elseif (strtolower($user->getPseudo()) == strtolower($row["pseudo"])) {
                $_SESSION["error"]["pseudo"] = "Ce pseudo est déja utilisé";
            } elseif (strtolower($user->getEmail()) == strtolower($row["email"])) {
                $_SESSION["error"]["email"] = "Cette email est déja utilisée";
            }
        }

        //Si le tableau users est vide alors tout est unique on peut ajouter un nouvel utilisateur
        if (!$users) {
            $sql = "INSERT INTO user (pseudo, email, password) VALUES (:pseudo, :email, :password)";
            $result = $this->db->query($sql, [
                "pseudo" => $user->getPseudo(),
                "email" => $user->getEmail(),
                "password" => $user->getPassword(),
            ]);
            return $result->rowCount() > 0;
        }
        return 0;
    }

    public function loginUser(string $email): ?User
    {
        $sql = "SELECT * FROM user WHERE email = :email";
        $result = $this->db->query($sql, [
            "email" => $email
        ]);
        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }
        return null;
    }

    public function editUser(User $user): void
    {
        //rechercher si un email ou pseudo est dans la bdd 
        $sqlUser = "SELECT id, pseudo, email FROM user WHERE pseudo = :pseudo OR email = :email";
        $resultUser = $this->db->query($sqlUser, [
            'pseudo' => $user->getPseudo(),
            'email' => $user->getEmail()
        ]);

        $results = [];

        foreach ($resultUser as $row) {
            $results[] = new User($row);
            // $row = new User();
            // $_SESSION["userId"] = $user->getId();
            // $_SESSION["rowId"] = $row->getId();
        }

        foreach ($results as $result) {
            $_SESSION["userId"] = $user->getId();
            $_SESSION["rowId"] = $result->getId();
            if ($user->getId() != $result->getId()) {
                $_SESSION["userId"] = $user->getId();
                $_SESSION["rowId"] = $result->getId();
            } else {
                $_SESSION["test"] = "c bon";
                unset($_SESSION["userId"]);
            }
        }

        // $row = new User();
        // if ($user->getId() != $row->getId()) {
        //     $_SESSION["userId"] = $user->getId();
        //     $_SESSION["rowId"] = $row->getId();
        //     //return -1; meme probleme sur blog emilie
        // } else {
        //     $_SESSION["test"] = "c bon";
        // }

        // $sql = "UPDATE user SET email = :email, pseudo = :pseudo, password = :password WHERE id = :id";
        // $this->db->query($sql, [
        //     "id" => $user->getId(),
        //     "email" => $user->getEmail(),
        //     "pseudo" => $user->getPseudo(),
        //     "password" => $user->getPassword(),
        // ]);
    }
}
