<?php

class ProductsController
{

    public function index()
    {

        require_once __DIR__ . '/../model/product.php';
        require_once __DIR__ . '/../model/cart.php';
        require_once __DIR__ . '/../model/cart-item.php';
        require_once __DIR__ . '/../service/productservice.php';
        require_once __DIR__ . '/../model/user.php';

        session_start();

        $user;
        $productId;
        $product;
        $productList = array();
        $cart;
        $productService = new ProductService();

        $productList = $productService->getAll();

        foreach ($productList as $prod) {
            $price = $prod->getPrice();
            $prod->setPrice($price);
        }

        if (isset($_SESSION["cart"])) {
            $cart = $_SESSION["cart"];
        }

        if (isset($_SESSION["user"])) {
            $user = $_SESSION["user"];
        }

        if (isset($_POST["logout"])) {
            $_SESSION["loggedin"] = false;
            header("location: home");
        }

        if (isset($_POST["add-item"])) {
            $productId = $_POST["product-id"];

            $product = $productService->getByProductId($productId);

            if ($product !== null) {
                $cartItem = new CartItem($product);
                $cartItem->setAmount($_POST["amount"]);

                $cart->addItem($cartItem);

                header("location: cart");
            }
        }


        include '../view/products/products.php';
    }
}
