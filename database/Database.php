<?php


class Database
{

    public $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('sqlite:database/db.sqlite');
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function getUser($username)
    {

        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

        var_dump($user);

        return $user;
    }

}