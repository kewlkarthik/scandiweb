<?php
namespace com\scandiweb\service;
use com\scandiweb\dto\ProductViewDto;
use com\scandiweb\dto\ProductAddDto;

class ProductService{

    const products = array("Book" => "com\\scandiweb\\entity\\Book", 
    "DVD" => "com\\scandiweb\\entity\\Dvd", 
    "Furniture" => "com\\scandiweb\\entity\\Furniture");
    private function factory($type){
        $selectedProd = self::products[$type];
        $prodObjToReturn = new $selectedProd();
        return $prodObjToReturn;
    }

    public function addProduct(ProductAddDto $prodAddDto){
        $prodToSave = $this->factory($prodAddDto->getProductType());
        $prodToSave->setSku($prodAddDto->getSku());
        $prodToSave->setName($prodAddDto->getName());
        $prodToSave->setPrice($prodAddDto->getPrice());
        $prodToSave->setAttributes($prodAddDto->getAttributes());

        $prodToSave->save();
    }

    public function deleteProducts($prdToDelete){
        foreach ($prdToDelete as $prd){
            $product = $this->factory($prd['productType']);
            $product -> delete($prd['sku']);
        }
    }

    public function getProducts(): array{
        $prodsList = [];
        foreach(array_keys(self::products) as $key) {
            $prodToView= $this->factory($key);
            $products = $prodToView -> getAll();
            $prodsList = array_merge($prodsList,$this->constructViewObjs($products));
        }
        return $prodsList;
    }

    private function constructViewObjs($products):array{
        $prdViewDtos= [];
        foreach($products as $prd){
            $prodViewDto = new ProductViewDto($prd->getSku(),
            $prd-> getName(), $prd -> getPrice(), $prd-> getProductType(),
            $prd-> getAttribute() -> getAttributeString());
            $prdViewDtos[] = $prodViewDto;
        }

        return $prdViewDtos;
    }
}
?>