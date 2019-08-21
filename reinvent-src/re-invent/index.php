<?php
session_start();

require_once "./assets/lib/Settings.php";
require_once "./assets/lib/Database.php";
require_once "./assets/lib/Notes.php";

$pageTitle  = Settings::$APP_NAME;
$db         = (new Database())->GetConnection();
$notes      = new Notes($db);

$list       = $notes->GetList();

Settings::GET_HEADER($pageTitle); 
?>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <a href="add.php" class="btn btn-primary">নতুন নোট যোগ করুন</a>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <table class="table table-hover table-responsive-xs table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
                        <thead>
                            <tr>
                                <th scope="col">শিরোনাম</th>
                                <th scope="col">সময়</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < count($list); $i++) {
                                $row = $list[$i];
                                
                                ?>
                                
                                <tr>
                                    <td><a href="edit.php?id=<?= $notes->GetId($row); ?>"><?= $notes->GetTitle($row); ?></a></td>
                                    <td><time datetime="<?= $notes->GetTime($row); ?>"><?= $notes->GetTime($row); ?></time></td>
                                    <td>
                                        <a href="edit.php?id=<?= $notes->GetId($row); ?>" class="btn btn-warning">দেখুন/সম্পাদনা করুন</a>
                                        <a href="delete.php?id=<?= $notes->GetId($row); ?>" class="btn btn-danger">মুছে ফেলুন</a>
                                    </td>
                                    
                                    <input name="id" type="hidden" value="<?= $notes->GetId($row); ?>" />
                                </tr>
                                    
                                <?php
                            }
                            
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

<script type="text/javascript" src="assets/js/app.js"></script>
            
<?php Settings::GET_FOOTER();
