<?php
require_once __DIR__ . '/model.php';
require_once __DIR__ . '/product.php';

class CartItem extends Model{

    //Fields
    private Product $product;
    private int $amount;

    //Constructor
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function setAmount(int $amount)
    {
        $this->amount = $amount;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }



    


}