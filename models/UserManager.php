<?php

class UserManager extends AbstractEntityManager
{
    public function createUser(User $user): bool
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
            $sql = "INSERT INTO user (pseudo, email, password, date_creation) VALUES (:pseudo, :email, :password, now())";
            $result = $this->db->query($sql, [
                "pseudo" => htmlspecialchars($user->getPseudo()),
                "email" => htmlspecialchars($user->getEmail()),
                "password" => htmlspecialchars($user->getPassword()),
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

    public function editUser(User $editUser, User $user): User
    {
        $sqlUser = "SELECT id, pseudo, email FROM user WHERE pseudo = :pseudo OR email = :email";
        $resultUser = $this->db->query($sqlUser, [
            'pseudo' => $editUser->getPseudo(),
            'email' => $editUser->getEmail()
        ]);

        $results = [];

        foreach ($resultUser as $result) {
            $results[] = new User($result);
        }

        if (count($results) == 2) {
            $_SESSION["error"] = "Pseudo ou adresse email déjà utilisé !";
            return $user;
        } else {
            $sql = "UPDATE user SET email = :email, pseudo = :pseudo, password = :password, avatar = :avatar WHERE id = :id";
            $this->db->query($sql, [
                "id" => $editUser->getId(),
                "email" => htmlspecialchars($editUser->getEmail()),
                "pseudo" => htmlspecialchars($editUser->getPseudo()),
                "password" => htmlspecialchars($editUser->getPassword()),
                "avatar" => htmlspecialchars($editUser->getAvatar()),
            ]);
            return $editUser;
        }
    }

    public function findUserTo(int $userId): ?User
    {
        $sql = "SELECT id, avatar, pseudo FROM user WHERE id = :id";
        $result = $this->db->query($sql, ["id" => $userId]);
        $userFrom = $result->fetch();
        if ($userFrom) {
            return new User($userFrom);
        }
        return null;
    }

    public function showProfilPublic(int $userId): array
    {
        $sql = "SELECT b.* , u.avatar, u.pseudo, u.date_creation FROM book b JOIN user u ON b.userId = u.id WHERE b.userId = :userId";
        $results = $this->db->query($sql, ["userId" => $userId]);
        $profils = [];
        foreach ($results as $row) {
            $profils[] = $row;
        }
        return $profils;
    }
}
