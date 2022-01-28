<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../model/order.php';
require_once __DIR__ . '/../model/order-line.php';

class OrderRepository extends Repository {
    
    function getOrderByDateTime($date_time){
        try {
            $stmt = $this->connection->prepare("SELECT `id`, `user_id`, `payment_method`, `total_price`, `date_time` FROM `order` WHERE date_time = STR_TO_DATE(?,'%d-%m-%Y %H:%i:%s')");
            $stmt->execute([$date_time]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Order');
            $user = $stmt->fetch();
            return $user;
        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    function insertOrder($order) {
        try {
            $stmt = $this->connection->prepare("INSERT INTO `order`(`user_id`, `payment_method`, `total_price`, `date_time`) VALUES (?,?,?,STR_TO_DATE(?,'%d-%m-%Y %H:%i:%s'))");            
            $stmt->execute([$order->getUserId(), $order->getPaymentMethod(), $order->getTotalPrice(), $order->getDateTime()]);

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function insertOrderLine($orderLine) {
        try {
            $stmt = $this->connection->prepare("INSERT INTO `order_line`(`order_id`, `product_id`, `amount`, `price`) VALUES (?,?,?,?)");            
            
            $stmt->execute([$orderLine->getOrderId(), $orderLine->getProductId(), $orderLine->getAmount(), $orderLine->getPrice()]);

        } catch (PDOException $e) {
            echo $e;
        }
    }
}