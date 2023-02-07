<?php

namespace com\scandiweb\dto;
use com\scandiweb\dto\ProductDto;

class ProductAddDto extends ProductDto{
    private array $attributes;

    public function __construct($sku, $name, $price, $type, $attributes){
        parent::__construct($sku, $name, $price, $type);
        $this->attributes = $attributes;
    }
    public function getAttributes():array
    {
        return $this->attributes;
    }

}

?>