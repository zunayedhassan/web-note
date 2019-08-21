<?php
/**
 * Description of Settings
 *
 * @author zunay
 */
class Settings {
    public static $APP_NAME     = "নোট";
    public static $DB_HOST      = "localhost";
    public static $DB_USERNAME  = "root";
    public static $DB_PASSWORD  = "";
    public static $DB_NAME      = "re-invent-db";


    static function GET_HEADER($pageTitle) {
        ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?= $pageTitle; ?></title>
        
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <!-- Typography -->
        <link rel="stylesheet" type="text/css" href="assets/css/typography.css" />
        
        <!-- Style -->
        <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    </head>
    <body>
        <main class="container-fluid">
        <?php
    }
    
    static function GET_FOOTER() {
        ?>
            </main>
    </body>
</html>
    
        <?php
    }
}
