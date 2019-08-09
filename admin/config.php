<?php

    session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $user = 'root';
    $pass = '';
    $db = 'accommodation';
    $connection = new mysqli('localhost', $user, $pass, $db) or die ("Unable to connect to DB");

    $server_link = "http://" . $_SERVER['HTTP_HOST'] . "/hotel_tracking/admin";

    // setting up the web root and server root for
    // this shopping cart application
    $thisFile = str_replace('\\', '/', __FILE__);
    $docRoot = $_SERVER['DOCUMENT_ROOT'];

    $webRoot  = str_replace(array($docRoot, 'admin/config.php'), '', $thisFile);
    $srvRoot  = str_replace('admin/config.php', '', $thisFile);

    define('WEB_ROOT', $webRoot);
    define('SRV_ROOT', $srvRoot);

    // all category image width must not
    // exceed 75 pixels
    define('MAX_CATEGORY_IMAGE_WIDTH', 600);

    // do we need to limit the product image width?
    // setting this value to 'true' is recommended
    define('LIMIT_PRODUCT_WIDTH', true);

    // maximum width for all product image
    define('MAX_PRODUCT_IMAGE_WIDTH', 1000);

    // the width for product thumbnail
    define('THUMBNAIL_WIDTH', 600);

    define('PRODUCT_IMAGE_DIR',  'images/');

?>
