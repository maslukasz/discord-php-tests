<?php


class Database
{

    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;

        $pdo = new PDO('sqlite:database/db.sqlite.db');
    }

    public function getUser($username)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

}