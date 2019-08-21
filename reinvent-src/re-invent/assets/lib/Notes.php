<?php

require_once 'Settings.php';
require_once 'Database.php';

class Notes {
    private $_database = null;

    public function __construct($database) {
        $this->_database = $database;
    }
    
    public function GetList() {
        $sql = "SELECT id, title, time FROM notes;";
        $stmt = $this->_database->query($sql);
        $rows = array();
        
        while ($row = $stmt->fetch()) {
            $item = array($row["id"], $row["title"], $row["time"]);
            array_push($rows, $item);
        }
        
        return $rows;
    }
    
    public function Add($title, $text) {
        $sql = 'INSERT INTO notes (title, text, time) VALUES ("' . addslashes($title) . '", "' . addslashes($text) . '", now());';
        $stmt= $this->_database->prepare($sql);
        $stmt->execute();
    }
    
    public function Delete($id) {
        $sql = "DELETE FROM notes WHERE id=" . $id . ";";
        $this->_database->exec($sql);
    }

    public function GetId($row) {
        return $row[0];
    }
    
    public function GetTitle($row) {
        return $row[1];
    }
    
    public function GetTime($row) {
        return $row[2];
    }
    
    public function GetText($id) {
        $sql = "SELECT * FROM notes WHERE id=" . $id . ";";
        $stmt = $this->_database->query($sql);
        $row = $stmt->fetch();
        
        return $row[2];
    }
    
    public function GetData($id) {
        $sql = "SELECT * FROM notes WHERE id=" . $id . ";";
        $stmt = $this->_database->query($sql);
        $row = $stmt->fetch();
        $item = array($row["id"], $row["title"], $row["time"]);
        
        return $item;
    }
    
    public function Update($id, $title, $text) {
        $sql = 'UPDATE notes SET title="' . addslashes($title) . '", text="' . addslashes($text) . '" WHERE id=' . $id;
        $stmt= $this->_database->prepare($sql);
        $stmt->execute();
    }
}