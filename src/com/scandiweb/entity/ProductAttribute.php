<?php
namespace com\scandiweb\entity;

abstract class ProductAttribute{
    private $name;
    private $unit;
   
    public function __construct($name, $unit){
        $this->name = $name;
        $this->unit = $unit;
    }

    abstract public function getAttributeString(): string;
}
?>