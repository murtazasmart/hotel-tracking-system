<?php

require_once 'config.php';
require_once 'functions.php';

checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : 'dashboard';

switch ($view) {
    case 'dashboard' :
        $content     = 'dashboard.php';
        $pageTitle     = 'Colombo Ashara 1441H Accommodation Manager - Welcome';
        break;

    case 'hotel' :
        $content     = 'hotel.php';
        $pageTitle     = 'Colombo Ashara 1441H Accommodation Manager - Home';
        break;

    case 'rooms' :
        $content     = 'rooms.php';
        $pageTitle     = 'Colombo Ashara 1441H Accommodation Manager - Rooms';
        break;

    default :
        $content     = 'dashboard.php';
        $pageTitle     = 'Colombo Ashara 1441H Accommodation Manager -  Welcome';
}

require_once 'template.php';

?>