<?php
session_start();

include('pages/SEO.php');
include('etc/json/bdd.php');

$insertmbr3 = $bdd->prepare('INSERT INTO visits(ip, motor, SCRIPT_NAME, timestamp, date) VALUES(?, ?, ?, UNIX_TIMESTAMP(), ?)');
$insertmbr3->execute(array($_SERVER['REMOTE_ADDR'], $_SERVER["HTTP_USER_AGENT"], $_SERVER["SCRIPT_NAME"], date('d-m-Y')));

$isbanned = $bdd->prepare("SELECT * FROM banned_ip WHERE ip = ?");
$isbanned->execute(array($_SERVER['REMOTE_ADDR']));
$banned = $isbanned->rowCount();

if ($banned == 0) {
    if (isset($_GET['page'])) {
        switch($_GET['page']) {
            case 'login':
                if (isset($_SESSION['id'])) {
                    include('pages/desktop.php');
                } else {
                    include('pages/login.php');
                }
            break;
            case 'desktop':
            default:
                if (isset($_SESSION['id'])) {
                    include('pages/desktop.php');
                } else {
                    include('pages/login.php');
                }
            break;
        }
    } elseif (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'disconnect':
                default:
                include('boot/actions/disconnect.php');          
            break;    
        }
    } else {
        if (isset($_SESSION['id'])) {
            include('pages/desktop.php');
        } else {
            include('pages/login.php');
        }
    }
} else {
    $banned_info = $isbanned->fetch();
    include('pages/banned.php');
}