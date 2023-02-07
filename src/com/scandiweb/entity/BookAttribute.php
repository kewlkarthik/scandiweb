<?php
namespace com\scandiweb\entity;
class BookAttribute extends ProductAttribute{
   const name = 'Weight';
   const unit = 'KG';
   private $weight;

   public function __construct($attributes){
      parent::__construct(self::name, self::unit);
      $this->weight = $attributes['weight'];
   }
   public function getAttributeString(): string{
      return self::name . ' : ' . $this->weight . ' '. self::unit;
   }

   public function getAttrsForSave(): array{
      $attr = array(self::name => $this -> weight);
      return $attr;
   }
   public function getWeight(){
      return $this -> weight;
   }

}

?>