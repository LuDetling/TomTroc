<?php

class Messagerie extends AbstractEntity
{
    private int $userFrom;
    private int $userTo;
    private string $message;

    /**
     * Getter pour le user qui envoi.
     * @param int $userFrom
     */
    public function getUserFrom(): int
    {
        return $this->userFrom;
    }

    /**
     * Setter pour le user qui envoi.
     * @param int $userFrom
     */
    public function setUserFrom(int $userFrom): void
    {
        $this->userFrom = $userFrom;
    }

    /**
     * Getter pour le user qui reçoit
     * @param int $userTo
     */
    public function getUserTo(): int
    {
        return $this->userTo;
    }

    /**
     * Setter pour le user qui reçoit
     * @param int $userTo
     */
    public function setUserTo(int $userTo): void
    {
        $this->userTo = $userTo;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }
}
