<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../model/article.php';

class ArticleRepository extends Repository {
    function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM articles");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Article');
            $articles = $stmt->fetchAll();
            return $articles;
        } catch (PDOException $e)
        {
            echo $e;
        }
    }
}