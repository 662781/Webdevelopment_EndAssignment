<?php

require __DIR__ . '/controller.php';

class ProductsController extends Controller{

    public function index(){
        // echo "You've reached the index method of the products controller";
        include '../view/products/products.php';
        // $this->displayView("model");
    }

    public function about(){
        echo "You've reached the about method of the products controller";
    }
}