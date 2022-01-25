<?php
require_once __DIR__ . '/../repository/productrepository.php';

class ProductService {

    private $repo;

    function __construct()
    {
        $this->repo = new ProductRepository();
    }
    
    public function getAll() {
        return $this->repo->getAll();
    }

    public function getByProductId($product_id) {
        return $this->repo->getByProductId($product_id);
    }

    
}