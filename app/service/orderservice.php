<?php
require_once __DIR__ . '/../repository/orderrepository.php';

class OrderService {

    private $repo;

    function __construct()
    {
        $this->repo = new OrderRepository();
    }
    
    public function insertOrder($order) {
        return $this->repo->insertOrder($order);
    }

    public function insertOrderLine($orderLine) {
        return $this->repo->insertOrderLine($orderLine);
    }

    function getOrderByDateTime($date_time){
        return $this->repo->getOrderByDateTime($date_time);
    }

    
}