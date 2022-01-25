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
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setCat_Id(int $cat_id): self
    {
        $this->cat_id = $cat_id;
        return $this;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }

    public function setIngredients(string $ingredients): self
    {
        $this->ingredients = $ingredients;
        return $this;
    }

}