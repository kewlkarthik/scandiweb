<?php
namespace com\scandiweb\orm;

class ProductAttrDb
{
    private $dbConn;

    public function __construct()
    {
        $this -> dbConn = Db::getInstance()->getConnection();
    }

    public function saveAttrs($attrValues):string{
        $columns = implode(", ",array_keys($attrValues));
        $values = implode(", ",array_values($attrValues));
        $query = "INSERT INTO product_attributes ($columns) VALUES ($values)"; 
        $response = $this->dbConn->query($query);
        if(!$response) {
            throw new \RuntimeException($this->dbConn->error);
        }
        return $this->dbConn->insert_id;
    }
}


?>
