<?php
require_once 'Settings.php';

class Database {
    private $_connection = null;


    public function __construct() {
        try {
            $conn = new PDO("mysql:host=" . Settings::$DB_HOST . ";dbname=" . Settings::$DB_NAME, Settings::$DB_USERNAME, Settings::$DB_PASSWORD);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $this->_connection = $conn;
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    
    public function GetConnection() {
        return $this->_connection;
    }
}
