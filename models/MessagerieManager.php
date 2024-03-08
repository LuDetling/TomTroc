<?php

class MessagerieManager extends AbstractEntityManager
{

    public function showAllUserWhoChat(int $userTo): array
    {
        $sql = "SELECT m.*, u.avatar, u.pseudo FROM messagerie m JOIN user u ON m.user_from = u.id WHERE m.user_to = :userTo GROUP BY m.user_from ORDER BY m.id DESC";
        $result = $this->db->query($sql, ["userTo" => $userTo]);
        $usersChat = [];
        foreach ($result as $userChat) {
            $usersChat[] = $userChat;
        }
        return $usersChat;
    }

    public function findMessageWithUserTo(int $userTo, int $idUserFrom): array
    {
        $sql = "SELECT m.*, u.avatar, u.pseudo FROM messagerie m JOIN user u ON m.user_from = u.id WHERE (user_to = :userTo AND user_from = :userFrom) OR (user_from = :userTo AND user_to = :userFrom) ORDER BY m.id DESC LIMIT 15";
        $result = $this->db->query($sql, ["userTo" => $userTo, "userFrom" => $idUserFrom]);
        $messages = [];

        while ($message = $result->fetch()) {
            $messages[] = $message;
        }
        return $messages;
    }

    public function sendNewMessage(Messagerie $messagerie): bool
    {
        $sql = "INSERT INTO messagerie (user_to, user_from, message, date_send) VALUES (:user_to, :user_from, :message, now())";
        $result = $this->db->query($sql, [
            "user_to" => $messagerie->getUserTo(),
            "user_from" => $messagerie->getUserFrom(),
            "message" => htmlspecialchars($messagerie->getMessage())
        ]);
        return $result->rowCount() > 0;
    }
}
