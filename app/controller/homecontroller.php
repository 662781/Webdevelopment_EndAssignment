<?php

class HomeController
{

    public function index()
    {
        require_once __DIR__ . '/../model/cart.php';
        require_once __DIR__ . '/../model/user.php';
        session_start();

        $user;

        if (!isset($_SESSION["loggedin"])) {
            $_SESSION["loggedin"] = false;
        }

        if (isset($_SESSION["user"])) {
            $user = $_SESSION["user"];
        }

        if (isset($_POST["logout"])) {
            $_SESSION["loggedin"] = false;
            header("location: home");
        }

        //Create shopping cart when user enters the website
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = new Cart();
        }

        include '../view/home/home.php';
        // $this->displayView();
    }
}
