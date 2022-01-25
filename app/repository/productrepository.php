<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../model/product.php';

class ProductRepository extends Repository {
    
    function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT id, name, category_id, price, ingredients FROM product");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
            $products = $stmt->fetchAll();
            return $products;
        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    function getByProductId($product_id){
        try {
            $stmt = $this->connection->prepare("SELECT id, name, category_id, price, ingredients FROM product WHERE id = ?");
            $stmt->execute([$product_id]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
            $product = $stmt->fetch();
            return $product;
        } catch (PDOException $e)
        {
            echo $e;
        }
    }
}