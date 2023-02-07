<?php
namespace com\scandiweb\entity;
use com\scandiweb\orm\ProductDb;

abstract class Product{
    private $sku;
    private $name;
    private $price;
    private ProductDb $prodDb;

    public function __construct()
    {
        $this->prodDb = new ProductDb();
    }

    public function getSku(){
        return $this->sku;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function getPrice(){
        return $this->price;
    }

    public function getProdDb(){
        return $this->prodDb;
    }

    public function setSku($sku){
        $this->sku = $sku;
    }
    
    public function setName($name){
        $this->name = $name;
    }
    
    public function setPrice($price){
        $this->price = $price;
    }
    
    /* Abstract Function */
    abstract public function save(): void;
    abstract public function delete($sku): void;
    abstract public function getAll(): array;
}
?>