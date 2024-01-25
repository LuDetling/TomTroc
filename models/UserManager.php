<?php

class UserManager extends AbstractEntityManager
{
    public function createUser(User $user): bool
    // public function newUser(User $user): bool
    {
        //Vérification si le pseudo et email son unique

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

    public function loginUser(User $user): ?User
    {
        $sql = "SELECT * FROM user WHERE email = :email AND password = :password";
        $result = $this->db->query($sql, [
            "email" => $user->getEmail(),
            "password" => password_verify($user->getPassword(), PASSWORD_BCRYPT)
        ]);
        $user = $result->fetch();
        if ($user) {
            $_SESSION["user"] = new Book($user);
            return new Book($user);
        }
        $_SESSION["user"] = password_verify($user->getPassword(), PASSWORD_BCRYPT);
        return null;
    }
}
