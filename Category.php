<?php

class Category {
    protected $name;
    protected $filters = [];
    public $listProducts;

    public function __construct($_name, $_filters)
    {
        $this->name = $_name;
        $this->filters['Price'] = $_filters;
    }
}
