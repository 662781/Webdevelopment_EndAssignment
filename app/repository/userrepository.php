<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../model/user.php';

class ArticleRepository extends Repository {
    function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM user");
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