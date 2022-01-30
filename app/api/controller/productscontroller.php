<?php
require_once __DIR__ . '/../../service/productservice.php';
require_once __DIR__ . '/../../model/product.php';

class ProductsController {

    private $productService; 

    // initialize services
    function __construct() {
        $this->productService = new ProductService();
    }

    public function index() {
        if($_SERVER["REQUEST_METHOD"] === "GET"){
            // return all products in the DB as JSON
        
            $productsJSON = $this->productService->getAll();
            echo json_encode($productsJSON);    
            // var_dump(json_encode($productsJSON));
        }
        
        
    }
}
?>