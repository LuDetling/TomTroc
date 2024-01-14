<?php

class UserManager extends AbstractEntityManager
{
    public function newUser(User $user): bool
    {
        $sql = "INSERT INTO user (pseudo, email, password) VALUES (:pseudo, :email, :password)";
        $result = $this->db->query($sql, [
            "pseudo" => $user->getPseudo(),
            "email" => $user->getEmail(),
            "password" => $user->getPassword(),
        ]);
        return $result->rowCount() > 0;
    }
}
