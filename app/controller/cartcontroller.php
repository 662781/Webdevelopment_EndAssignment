<?php

require __DIR__ . '/controller.php';

class CartController extends Controller{

    public function index(){
        // echo "You've reached the index method of the cart controller";
        include '../view/cart/cart.php';
        // $this->displayView("model");
    }

    public function about(){
        echo "You've reached the about method of the cart controller";
    }
}