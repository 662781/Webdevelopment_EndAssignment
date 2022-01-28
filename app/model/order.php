<?php
require_once __DIR__ . '/model.php';

class Order extends Model{

    //Fields
    private int $id;
    private int $user_id;
    private string $payment_method;
    private float $total_price;
    private string $date_time;

    
    //Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function getPaymentMethod(): string
    {
        return $this->payment_method;
    }

    public function getDateTime(): string
    {
        return $this->date_time;
    }

    public function getTotalPrice(): float
    {
        return $this->total_price;
    }

    //Setters
    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setUserId(int $user_id)
    {
        $this->user_id = $user_id;
    }

    public function setPaymentMethod(string $payment_method)
    {
        $this->payment_method = $payment_method;
    }

    public function setDateTime(string $date_time)
    {
        $this->date_time = $date_time;
    }

    public function setTotalPrice(float $total_price)
    {
        $this->total_price = $total_price;
    }

}