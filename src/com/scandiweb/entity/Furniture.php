<?php

namespace com\scandiweb\entity;

class Furniture extends Product
{
    private const TYPE = 'Furniture';
    private FurnitureAttribute $furnAttr;

    public function setAttributes($attributes){
        $this ->furnAttr = new FurnitureAttribute($attributes);
    }

    public function getProductType(){
        return self::TYPE;
    }

    public function getAttribute(){
        return $this->furnAttr;
    }

    public function save(): void{
        $productAttr = $this->furnAttr->getAttrsForSave(); 
        parent::getProdDb()-> save(parent::getSku(),parent::getName(),
        parent::getPrice(),self::TYPE, $productAttr);
    }
    public function delete($sku): void{
        parent::getProdDb()->delete($sku);
    }
    public function getAll(): array{
        $items = parent::getProdDb()->getProductWithAttrByType(self::TYPE);
        return $this->constructObj($items);
    }

    private function constructObj($items): array{
        $furnArr = [];
        foreach($items as $item){
            $furniture = new Furniture();
            $furniture -> setSku($item['sku']);
            $furniture -> setName($item['name']);
            $furniture -> setPrice($item['price']);
            $furniture -> setAttributes($item);
            $furnArr[] = $furniture;
        }
        return $furnArr;
    }
}

?>