<?php
namespace com\scandiweb\entity;
class DvdAttribute extends ProductAttribute{
    const name = 'Size';
    const unit = 'MB';
    private $size;

    public function __construct($attributes){
        parent::__construct(self::name, self::unit);
        $this->size = $attributes['size'];
    }
     public function getAttributeString(): string{
        return self::name . ' : ' . $this->size . ' ' .self::unit;
    }

    public function getAttrsForSave(): array{
        $attr = array(self::name => $this -> size);
        return $attr;
    }
    public function getSize(){
    return $this -> size;
    }

}

?>