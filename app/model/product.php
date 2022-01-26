<?php
require_once __DIR__ . '/model.php';

class Product extends Model{

    //Fields
    private int $id;
    private string $name;
    private int $cat_id;
    private float $price;
    private string $ingredients;

    //Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCat_Id(): int
    {
        return $this->cat_id;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getIngredients(): string
    {
        return $this->ingredients;
    }

    //Setters
    public function setId(int $id)
    {
        $this->id = $id;
        
    }

    public function setName(string $name)
    {
        $this->name = $name;
        
    }

    public function setCat_Id(int $cat_id)
    {
        $this->cat_id = $cat_id;
        
    }

    public function setPrice(float $price)
    {
        $this->price = round($price, 2);
        
    }

    public function setIngredients(string $ingredients){
        $this->ingredients = $ingredients;
        
    }

}