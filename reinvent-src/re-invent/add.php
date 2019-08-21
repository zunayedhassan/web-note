<?php
session_start();

require_once "./assets/lib/Settings.php";
require_once "./assets/lib/Notes.php";

$pageTitle = "নতুন নোট যোগ করুন";

Settings::GET_HEADER($pageTitle);

if (isset($_POST["sn-title"])) {
    $title = $_POST["sn-title"];
    $text = isset($_POST["sn-text"]) ? $_POST["sn-text"] : "";
    
    $db = (new Database())->GetConnection();
    $notes = new Notes($db);
    $notes->Add($title, $text);
    
    header("Location: index.php");
}

?>
<form action="add.php" method="post">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <a class="btn btn-light" href="index.php">&larr; পিছনে</a>
            <button id="save-button" type="submit" class="btn btn-success">সংরক্ষণ করুন</button>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="sn-note-title">শিরোনাম</span>
                </div>
                <input id="sn-title" name="sn-title" type="text" class="form-control" placeholder="এখানে শিরনাম লেখুন">
            </div>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">লেখা</span>
                </div>
                <textarea id="sn-text" name="sn-text" class="form-control" rows="15"></textarea>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript" src="assets/js/Add.js"></script>
<?php 

Settings::GET_FOOTER();
