<?php

namespace com\scandiweb\entity;

class Book extends Product
{
    private const TYPE = 'Book';
    private BookAttribute $bookAttr;

    public function setAttributes($attributes){
        $this -> bookAttr = new BookAttribute($attributes);
    }

    public function getProductType(){
        return self::TYPE;
    }
    public function getAttribute(){
        return $this->bookAttr;
    }

    public function save(): void{
        $productAttr = $this->bookAttr->getAttrsForSave(); 
        parent::getProdDb()->save(parent::getSku(),parent::getName(),
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
        $bookArr = [];
        foreach($items as $item){
            $book = new Book();
            $book -> setSku($item['sku']);
            $book -> setName($item['name']);
            $book -> setPrice($item['price']);
            $book -> setAttributes($item);
            $bookArr[] = $book;
        }
        return $bookArr;
    }
}

?>