<?php

namespace com\scandiweb\orm;
use mysqli;

class Db{
    protected $conn;
    private $config;
    private $configPath;
    private static $staticInstance = NULL;

    public static function getInstance(){
        if(Db::$staticInstance == NULL){
            Db::$staticInstance = new Db();
            Db::$staticInstance -> setupConnection();
        }
        return Db::$staticInstance;
    }

    private function setupConnection()
    {
        try {
            $this->configPath = __DIR__ . '/../config/config.ini';
            $this->config = parse_ini_file($this->configPath);
            $this->conn = new mysqli(
                    $this->config['db_server'],
                    $this->config['db_username'],
                    $this->config['db_password'],
                    $this->config['db_name']
            );
        } catch (\RuntimeException $e) {
            echo "connection failed" . $e->getMessage();
        }
    }

    public function getConnection(){
        return $this->conn;
    }
}

?>