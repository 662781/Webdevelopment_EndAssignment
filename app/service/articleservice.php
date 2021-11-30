<?php
require __DIR__ . '/../repository/articlerepository.php';
class ArticleService {
    public function getAll() {
        $repository = new ArticleRepository();
        return $repository->getAll();
    }
}