<?php

session_start();

require_once "./assets/lib/Settings.php";
require_once "./assets/lib/Notes.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    $db = (new Database())->GetConnection();
    $notes = new Notes($db);
    $notes->Delete($id);
}

header("Location: index.php");