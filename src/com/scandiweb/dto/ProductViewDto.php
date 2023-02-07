<?php

namespace com\scandiweb\dto;

class ProductViewDto extends ProductDto{
    private string $attributes;

    public function __construct($sku, $name, $price, $type, $attributes){
        parent::__construct($sku, $name, $price, $type);
        $this->attributes = $attributes;
    }
    public function getAttributes():string
    {
        return $this->attributes;
    }

}

?>