<?php

namespace com\scandiweb\entity;

class Dvd extends Product
{
    private const TYPE = 'DVD';
    private DvdAttribute $dvdAttr;

    public function setAttributes($attributes){
        $this ->dvdAttr = new DvdAttribute($attributes);
    }
    public function getProductType(){
        return self::TYPE;
    }

    public function getAttribute(){
        return $this->dvdAttr;
    }

    public function save(): void{
        $productAttr = $this->dvdAttr->getAttrsForSave(); 
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
        $dvdArr = [];
        foreach($items as $item){
            $dvd = new Dvd();
            $dvd -> setSku($item['sku']);
            $dvd -> setName($item['name']);
            $dvd -> setPrice($item['price']);
            $dvd -> setAttributes($item);
            $dvdArr[] = $dvd;
        }
        return $dvdArr;
    }
}

?>