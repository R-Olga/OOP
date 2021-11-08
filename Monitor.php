<?php

include_once('Product.php');

class Monitor extends Product {
    public $diagonal;
    public $frequency;
    public $ports;

    public function __construct($name, $price, $description, $brand, $diagonal, $frequency, $ports)
    {
        parent:: __construct($name, $price, $description, $brand);
        $this->diagonal = $diagonal;
        $this->frequency = $frequency;
        $this->ports = $ports;
    }

    public function getProduct() {
        $info = parent::getProduct();
        $info .= ", Model: " . $this->model . ", Diagonal: " . $this->diagonal . ", Frequency: " . $this->frequency . ", Ports: " . $this->ports;

        return $info;
    }
}