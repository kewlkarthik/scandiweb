<?php

namespace com\scandiweb\dto;

class ProductDto{

    private $sku;
    private $name;
    private $price;
    private $productType;

    public function __construct($sku, $name, $price, $type){
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->productType = $type;
    }

    public function getSku()
    {
        return $this->sku;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getPrice()
    {
        return $this->price;
    }

    public function getProductType()
    {
        return $this->productType;
    }
}

?>