<?php
namespace com\scandiweb\entity;
class FurnitureAttribute extends ProductAttribute{
    const name = 'Dimension';
    const unit = '';
    private $width;
    private $length;
    private $height;

    public function __construct($attributes){
        parent::__construct(self::name, self::unit);
        $this->width = $attributes['width'];
        $this->length = $attributes['length'];
        $this->height = $attributes['height'];
    }
    public function getAttributeString(): string{
        return self::name. ' : ' . $this->height. 'x' . $this ->width . 'x' . $this ->length . self::unit;
    }
    public function getDimmension(){
        return [$this -> width, $this -> length, $this -> height];
    }
    public function getAttrsForSave(): array{
        $attrs['width'] = $this->width;
        $attrs['length'] = $this->length;
        $attrs['height'] = $this->height;
        return $attrs;
    }

}

?>