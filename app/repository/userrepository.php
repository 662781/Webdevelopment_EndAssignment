<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../model/user.php';

class UserRepository extends Repository {
    function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT id, username, email, password, created_at FROM user");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $articles = $stmt->fetchAll();
            return $articles;
        } catch (PDOException $e)
        {
            echo $e;
        }
    }
}