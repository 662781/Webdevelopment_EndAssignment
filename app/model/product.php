<?php
require_once __DIR__ . '/model.php';

class Product implements JsonSerializable{

    //Fields
    private int $id;
    private string $name;
    private int $category_id;
    private float $price;
    private string $ingredients;
    private string $img_path;

    //Gets all the properties (fields)
    public function jsonSerialize():mixed
    {
        return get_object_vars($this);
    } 

    
    //Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCatId(): int
    {
        return $this->category_id;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getIngredients(): string
    {
        return $this->ingredients;
    }

    public function getImgPath(): string
    {
        return $this->img_path;
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

    public function setCatId(int $category_id)
    {
        $this->category_id = $category_id;
        
    }

    public function setPrice(float $price)
    {
        $this->price = round($price, 2);
        
    }

    public function setIngredients(string $ingredients){
        $this->ingredients = $ingredients;
        
    }

    public function setImgPath(string $img_path){
        $this->img_path = $img_path;
        
    }

}