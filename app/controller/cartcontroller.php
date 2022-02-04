<?php

class CartController
{

    public function index()
    {

        require_once __DIR__ . '/../model/cart.php';
        require_once __DIR__ . '/../model/cart-item.php';
        require_once __DIR__ . '/../model/user.php';
        require_once __DIR__ . '/../service/orderservice.php';
        session_start();

        $user;
        $cart;
        $product_id;
        $total_price = 0;
        $confirmation = "";
        $error = "";
        $order_service = new OrderService();

        if (isset($_SESSION["cart"])) {

            $cart = $_SESSION["cart"];

            foreach ($cart->getItems() as $item) {
                $total_price += ($item->getProduct()->getPrice() * $item->getAmount());
            }
        }

        if (isset($_SESSION["user"])) {
            $user = $_SESSION["user"];
        }

        if (isset($_POST["logout"])) {
            $_SESSION["loggedin"] = false;
            header("location: home");
        }

        if (isset($_POST["del-item"])) {
            $product_id = $_POST["product-id"];
            foreach ($cart->getItems() as $item) {
                if ($item->getProduct()->getId() == $product_id) {
                    $cart->delItem($item);
                    header("location: cart");
                }
            }
        }

        if (isset($_POST["pay"])) {
            if ($_POST["cartUser"] != "" && $_POST["cartEmail"] != "" && $_POST["cartAddress"] != "" && $_POST["cartPostalCode"] != "" && $_POST["paymentMethod"] != "") {
                $username = $_POST["cartUser"];
                $email = $_POST["cartEmail"];
                $address = $_POST["cartAddress"];
                $postalcode = $_POST["cartPostalCode"];
                $paymentMethod = $_POST["paymentMethod"];
                $datetime = date("d-m-Y H:i:s");

                $order = new Order();
                //Check if user is logged-in then set their userId, else set the default guest id
                if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                    $order->setUserId($user->getId());
                } else {
                    $order->setUserId(7);
                }

                $order->setDateTime($datetime);
                $order->setPaymentMethod($paymentMethod);
                $order->setTotalPrice($total_price);

                $order_service->insertOrder($order);

                $orderId = $order_service->getOrderByDateTime($datetime)->getId();

                foreach ($cart->getItems() as $item) {
                    $orderline = new OrderLine();
                    $orderline->setOrderId($orderId);
                    $orderline->setProductId($item->getProduct()->getId());
                    $orderline->setAmount($item->getAmount());
                    $orderline->setPrice($item->getProduct()->getPrice() * $item->getAmount());
                    $order_service->insertOrderLine($orderline);
                }

                //Send email to given email address
                // $to      = $email;
                // $subject = 'Test van KlaasDeTester';
                // $message = 'Hello World!';
                // $headers = 'From: 662781@student.inholland.nl' . "\r\n" .
                //     'Reply-To: 662781@student.inholland.nl' . "\r\n" .
                //     'X-Mailer: PHP/' . phpversion();

                // mail($to, $subject, $message, $headers);

                $confirmation = "Order received! Check your mailbox (" . $email . ") for further details.";
            } else {
                $error = "Please fill in all fields before submitting!";
            }
        }

        include '../view/cart/cart.php';
    }
}
