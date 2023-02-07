<?php
namespace com\scandiweb\orm;
class ProductDb{

    private $dbConn;
    private ProductAttrDb $prdAttrDb;

    public function __construct(){
        $this->dbConn = Db::getInstance()->getConnection();
        $this -> prdAttrDb = new ProductAttrDb();
    }
    
    public function save($sku, $name, $price, $type, $productAttrs){
        $this->dbConn->begin_transaction();
        try {
            $productAttrId = $this->prdAttrDb->saveAttrs($productAttrs);
            $query = "INSERT INTO products (sku, name, price, type, product_attribute_id) VALUES
            ('$sku', '$name', '$price', '$type','$productAttrId')";
            $response = $this->dbConn->query($query);
            if (!$response) {
                //$err = "Connect Error: " . $this->dbConn->error;
                echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>';
                echo '<script language="javascript">';
                echo "$(document).ready(function(){";
                echo "$('input#sku').addClass('is-invalid');";
                echo "$('input#sku').next().text('Duplicate entry " . $sku . "');";
                echo "});</script>";
                //echo $err;
                //throw new \RuntimeException($this->dbConn->error);
            } else{
                header('location: index.php');
            }
            $this->dbConn->commit();
        }catch (\mysqli_sql_exception $exception) {
            $this->dbConn->rollback();
            throw $exception;
        }
    }

    public function delete($sku){		
        $query = "DELETE FROM products where sku = '$sku'";			
        $response = $this->dbConn->query($query);
        if(!$response) {
            throw new \RuntimeException($this->dbConn->error);
        }
    }

    public function getProductWithAttrByType($productType):array{
        $data =[];
        $query = "SELECT p.*, pa.* FROM 
           products AS p
           INNER JOIN product_attributes AS pa ON p.product_attribute_id=pa.id
           WHERE p.type='$productType'";
        $response = $this->dbConn->query($query);       
        if(!$response) {
            throw new \RuntimeException($this->dbConn->error);
        }else {
            while($row = $response->fetch_assoc()){
                $data[] = $row;
            }
        }
        return $data;
    }

}
?>