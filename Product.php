<?php

class Product {
    public $name;
    public $price;
    public $description;
    public $brand;

    public function __construct($name, $price, $description, $brand)
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->brand = $brand;
    }

    public function getProduct() {
        $info = "Name: " . $this->name . ", Price: " . $this->price . ", Description: " . $this->description . ", Brand: " . $this->brand;

        return $info;
    }
}
