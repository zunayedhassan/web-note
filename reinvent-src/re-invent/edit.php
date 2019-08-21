<?php
session_start();

require_once "./assets/lib/Settings.php";
require_once "./assets/lib/Notes.php";

$db = (new Database())->GetConnection();
$notes = new Notes($db);

$id = null;

if (isset($_POST["sn-title"])) {
    $id = $_POST["id"];
    $title = $_POST["sn-title"];
    $text = isset($_POST["sn-text"]) ? $_POST["sn-text"] : "";
    $notes->Update($id, $title, $text);
    
    header("Location: edit.php?id=" . $id);
}

$pageTitle = null;
$data = null;
$text = null;

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $data = $notes->GetData($id);
    $text = $notes->GetText($id);
    
    $pageTitle = $notes->GetTitle($data) . " - সম্পাদনা করুন";
}
else {
    header("Location: index.php");
}

Settings::GET_HEADER($pageTitle);
?>
<form action="edit.php" method="post">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <a class="btn btn-light" href="index.php">&larr; পিছনে</a>
            <button id="save-button" type="submit" class="btn btn-success">সংরক্ষণ করুন</button>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <input name="id" id="id" type="hidden" value="<?= $id; ?>" />
            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="sn-note-title">শিরোনাম</span>
                </div>
                <input id="sn-title" name="sn-title" type="text" class="form-control" placeholder="এখানে শিরনাম লেখুন" value="<?= $notes->GetTitle($data); ?>">
            </div>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">লেখা</span>
                </div>
                <textarea id="sn-text" name="sn-text" class="form-control" rows="15"><?= $text; ?></textarea>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript" src="assets/js/Add.js"></script>
<?php 

Settings::GET_FOOTER();
