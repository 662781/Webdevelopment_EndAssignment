<?php
require_once __DIR__ . '/model.php';
require_once __DIR__ . '/cart-item.php';

class Cart extends Model{

    //Variables
    private $items = array();

    //Getters
    public function getItems(): array
    {
        return $this->items;
    }

    public function addItem(CartItem $newItem){
        array_push($this->items, $newItem);
    }

    public function delItem(CartItem $oldItem){
        if (($key = array_search($oldItem, $this->items)) !== false) {
            unset($this->items[$key]);
        }
    }

    


}